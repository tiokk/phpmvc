<?php

class Image{
	
	public static function compress($dataImage){
		$srcName	= $dataImage['img_name'];
		$ext		= $dataImage['img_ext'];
		$image_array_1 = explode(";", $dataImage['image']); 
		$image_array_2 = explode(",", $image_array_1[1]);
		$image = base64_decode($image_array_2[1]);
		$org_w = 600;
		$org_h = 600;
		$new_w = 240;
		$new_h = 240;
		$image_src = imagecreatefromstring(base64_decode($image_array_2[1]));
		$image_rsz = imagecreatetruecolor($new_w, $new_h);
		imagecopyresampled($image_rsz, $image_src, 0, 0, 0, 0, $new_w, $new_h, $org_w, $org_h);
		ob_start();
		imagejpeg($image_rsz);
		$img_thumb = ob_get_contents();
		ob_end_clean(); 
		$imageName = 'img/avatar/'.$srcName.'-[600x600].'.$ext;
		$imageName_thumb = 'img/thumbnail/'.$srcName.'-[240x240].'.$ext;
		if (file_exists($imageName) && file_exists($imageName_thumb) ){
			unlink($imageName);
			unlink($imageName_thumb);
			file_put_contents($imageName, $image);
			file_put_contents($imageName_thumb, $img_thumb);
		}else{
			file_put_contents($imageName, $image);
			file_put_contents($imageName_thumb, $img_thumb);
		}
		$response['avatar']	    =$imageName;
		$response['thumbnail']	=$imageName_thumb;
		return $response;
	}
	
	public static function deleteImg($oldImage){
		$imageName		=$oldImage['old_ava'];
		$imageName_thumb=$oldImage['old_thumb'];
		if (file_exists($imageName) && file_exists($imageName_thumb) ){
			unlink($imageName);
			unlink($imageName_thumb);
		}				
		return $dataImage['status']=true;
	}
	
}