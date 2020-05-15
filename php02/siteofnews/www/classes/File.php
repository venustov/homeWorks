<?php


class File
{
  public static function uploadImg($field)
  {
    if (0 != $_FILES[$field]['error']){
      return false;
    }

    if (is_uploaded_file($_FILES[$field]['tmp_name'])){

      $filePath = $_FILES[$field]['tmp_name'];
      $name = substr(md5_file($filePath), 0, 10);
      $image = getimagesize($filePath);
// Сгенерируем расширение файла на основе типа картинки
      $extension = image_type_to_extension($image[2]);
// Сократим .jpeg до .jpg
      $format = str_replace('jpeg', 'jpg', $extension);
      $name .= $format;

      $res = move_uploaded_file(
        $_FILES[$field]['tmp_name'],
        __DIR__ . '/../img/' . $name
      );
      if (!$res) {
        return false;
      }
      else {
        return $name;
      }
    }

    return false;
  }
}