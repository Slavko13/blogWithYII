<?php 

namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;


class ImageUpload extends Model
{
	public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions'=> 'jpg,png']

        ];
    }

    public function UploadFile(UploadedFile $file, $currentImage) {

        $this->image = $file;

        if ($this->validate()) {

            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }

    }
        private function getDirectory() {
            return Yii::getAlias('@web') . 'uploads/';
        }

        private function generateFileName() {
            return strtolower(md5(uniqid($this->image->baseName))) . '.' .$this->image->extension;

        }

        private function fileExist($currentImage) {
            if(!empty($currentImage) && $currentImage != null)
            {
                return file_exists($this->getDirectory() . $currentImage);
            }
        }

        public function deleteCurrentImage($currentImage) {
            if($this->fileExist($currentImage))
            {
                unlink($this->getDirectory() . $currentImage);
            }

        }


        private function saveImage() {
            $fileName = $this->generateFileName();
            $this->image->saveAs($this->getDirectory(). $fileName );
            return $fileName;
        }
}

?>