<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Attachment extends Model
	{
		use SoftDeletes;
		
		public $timestamps = true;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		public function getFileSizeKBAttribute($value)
		{
			if ($this->filesize < 1024) {
				return "{$this->filesize} bytes";
				} elseif ($this->filesize < 1048576) {
				$size_kb = round($this->filesize/1024);
				return "{$size_kb} KB";
				} else {
				$size_mb = round($this->filesize/1048576, 1);
				return "{$size_mb} MB";
			}
		}
	}
