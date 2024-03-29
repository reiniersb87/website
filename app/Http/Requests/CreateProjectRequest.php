<?php namespace Hel\Http\Requests;

use Hel\Http\Requests\Request;

class CreateProjectRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required',
			'description' => 'required',
			'categories' => 'required',
			'tags' => 'required',
			'url' => 'required|url',
			'file' => 'required|image',
			'user_email' => 'email',
		];
	}

}
