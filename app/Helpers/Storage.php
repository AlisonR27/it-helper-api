<?php

class Helper {
  protected function uploadImages($file, $path)
  {
      $date = Carbon::now();
      $filePath = $path . "/$date->year";
      $filename = $date->timestamp . '_' . $file->getClientOriginalName();
      return $file->storeAs(
          $filePath, $filename, 'public'
      );
  }

}