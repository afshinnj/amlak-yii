<?php

namespace app\modules\dashboard\models;

use Yii;
use yii\db\ActiveRecord;
use yii\imagine\Image;
use app\modules\dashboard\dashboard;
use yii\web\UploadedFile;

/**
 * This is the model class for table "filemanager_mediafile".
 *
 * @property integer $id
 * @property string $filename
 * @property string $type
 * @property string $url
 * @property string $alt
 * @property integer $size
 * @property string $description
 * @property string $thumbs
 * @property integer $created_at
 * @property integer $updated_at
 * @property Owners[] $owners
 */
class Mediafile extends ActiveRecord {

    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%home_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['filename'], 'required'],
            [['filename', 'type', 'size', 'url', 'alt', 'description', 'thumbs', 'home_id', 'owner_id', 'create_time', 'update_time'], 'safe'],
            [['image'], 'file', 'extensions' => ' jpg, png, gif', 'mimeTypes' => 'image/jpeg, image/png', 'maxSize' => 1024 * 1024 * 1024],
        ];
    }

    public function behaviors() {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'value' => function () {
                    return Yii::$app->jdate->date('Y-m-d H:i:s');
                },
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'create_time',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
                ],
            ],
        ];
    }

    /**
     * Save just uploaded file
     * @param array $routes routes from module settings
     * @return bool
     */
    public function saveUploadedFile(array $routes) {
        $model = new Mediafile();
        $username = Yii::$app->user->identity->username;

        $structure = "$routes[baseUrl]/$routes[uploadPath]/$username";
        $basePath = Yii::getAlias($routes['basePath']);
        $absolutePath = "$basePath/$structure";

        if (!file_exists($absolutePath)) {
            mkdir($absolutePath, 0777, true);
        }
        
        $model->image = UploadedFile::getInstance($model, 'image');
        $filename = md5($model->image->baseName . time()) . '.' . $model->image->extension;
        $model->image->saveAs($absolutePath . '/' . $filename);
        $model->filename = $filename;
        $model->type = $model->image->type;
        $model->size = $model->image->size;
        $model->owner_id = Yii::$app->user->identity->id;
        $model->url = "$structure/$filename";
        $model->save(false);
        $model->createThumbs($routes, dashboard::thumbs());
    }

    /**
     * Create thumbs for this image
     *
     * @param array $routes see routes in module config
     * @param array $presets thumbs presets. See in module config
     * @return bool
     */
    public function createThumbs(array $routes, array $presets) {
        $thumbs = [];
        $basePath = $basePath = Yii::getAlias($routes['basePath']);
        $originalFile = pathinfo($this->url);
        $dirname = $originalFile['dirname'];
        $filename = $originalFile['filename'];
        $extension = $originalFile['extension'];

        Image::$driver = [Image::DRIVER_GD2, Image::DRIVER_GMAGICK, Image::DRIVER_IMAGICK];

        foreach ($presets as $alias => $preset) {
            $width = $preset['size'][0];
            $height = $preset['size'][1];

            $thumbUrl = "$dirname/$filename-{$width}x{$height}.$extension";

            Image::thumbnail("$basePath/{$this->url}", $width, $height)->save("$basePath/$thumbUrl");

            $thumbs[$alias] = $thumbUrl;
        }

        $this->thumbs = serialize($thumbs);
        $this->detachBehavior('timestamp');

        // create default thumbnail
        $this->createDefaultThumb($routes);

        return $this->save(false);
    }

    /**
     * Create default thumbnail
     *
     * @param array $routes see routes in module config
     */
    public function createDefaultThumb(array $routes) {
        $originalFile = pathinfo($this->url);
        $dirname = $originalFile['dirname'];
        $filename = $originalFile['filename'];
        $extension = $originalFile['extension'];

        Image::$driver = [Image::DRIVER_GD2, Image::DRIVER_GMAGICK, Image::DRIVER_IMAGICK];

        $size = dashboard::getDefaultThumbSize();
        $width = $size[0];
        $height = $size[1];
        $thumbUrl = "$dirname/$filename-{$width}x{$height}.$extension";
        $basePath = Yii::getAlias($routes['basePath']);
        Image::thumbnail("$basePath/{$this->url}", $width, $height)->save("$basePath/$thumbUrl");
    }

}
