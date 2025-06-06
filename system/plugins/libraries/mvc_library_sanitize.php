<?php

class MVC_Library_Sanitize
{
	public function array($request, $exclude = [])
	{
		$sanitized = []; 

		foreach ($request as $key => $value):
			if(!is_array($value) && !in_array($key, $exclude)):
				if($this->isEmail($value)):
	        		$sanitized[$key] = trim($this->email($value));
	        	elseif($this->isUrl($value)):
	        		$sanitized[$key] = trim($this->url($value));
	        	else:
	        		$sanitized[$key] = trim($this->string($value));
	        	endif;
        	else:
        		$sanitized[$key] = $value;
        	endif;
		endforeach;

		return $sanitized;
	}

	public function length($requests, $minimum = 3)
	{
		if(is_array($requests)):
			foreach($requests as $request):
				if(strlen($request) < ($minimum + 1))
					return false;
			endforeach;
		else:
			if(strlen($requests) < ($minimum + 1))
				return false;
		endif;

		return true;
	}

	public function string($string)
	{
	    return filter_var($string, FILTER_SANITIZE_STRING);
	}

	public function email($string)
	{
	    return filter_var($string, FILTER_SANITIZE_EMAIL);
	}

	public function url($string)
	{
	    return filter_var($string, FILTER_SANITIZE_URL);
	}

	public function htmlEncode($string)
	{
	    return htmlspecialchars($string);
	}

	public function htmlDecode($string)
	{
	    return htmlspecialchars_decode($string);
	}

	public function isInt($int)
	{
	    if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false)
	        return true;
	    else
	        return false;
	}

	public function isFloat($float)
	{
		if (filter_var($float, FILTER_VALIDATE_FLOAT))
			return true;
		else
			return false;
	}

	public function isEmail($string)
	{
	    if (!filter_var($string, FILTER_VALIDATE_EMAIL) === false)
	        return true;
	    else
	        return false;
	}

	public function isURL($string)
	{
	    if (!filter_var($string, FILTER_VALIDATE_URL) === false)
	        return true;
	    else
	        return false;
	}

	public function isValidToken($request, $token = "_token")
	{
		return \Volnix\CSRF\CSRF::validate($request, $token);
	}
}