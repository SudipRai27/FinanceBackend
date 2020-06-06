<?php

class ConfigurationController extends Controller
{
	public function removeGlobal($type)
	{
		if(Session::has($type))
			Session::forget($type);
	}

}
