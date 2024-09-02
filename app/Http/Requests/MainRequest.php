<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

use Validator;

abstract class MainRequest
{
    private $validationErrors = [];
    private $customErrorMessages = [];
    private $validationRules = [];

    public $request;

    /**
     * Class constructor
     *
     * @param  Request $request
     * @param  array   $validationRules
     * @param  array   $customErrorMessages
     * @return void
     */
    public function __construct(Request $request, array $validationRules = [], array $customErrorMessages = [])
    {
        $this->request = $request;
        $this->validationRules = $validationRules;
        $this->customErrorMessages = $customErrorMessages;
    }

    /**
     * Returns the value of an attribute in the request body
     *
     * @param string $attributeName Attribute name
     * @return mixed
     */
    public function get(string $attributeName)
    {
        return $this->request->get($attributeName);
    }

    /**
     * Returns the value of an attribute in the request header
     *
     * @param string $headerKey Header key
     * @return string
     */
    public function getHeader($headerKey)
    {
        return $this->request->header($headerKey);
    }

    /**
     * Returns the value of an attribute in the request query string
     *
     * @param   string $attributeName Attribute name
     * @return  bool
     */
    public function has(string $attributeName)
    {
        return $this->request->has($attributeName);
    }

    /**
     * Returns all the attributes in the request
     *
     * @return array
     */
    public function all()
    {
        return $this->request->all();
    }

    /**
     * Returns the value of an attribute in the request URL
     *
     * @param string $attributeName Attribute name
     * @return mixed
     */
    public function getParameterFromUrl(string $attributeName)
    {
        return $this->request->route($attributeName);
    }

    /**
     * Returns the value of an attribute in the request URL
     *
     * @param array $validationErrors
     * @return void
     */
    public function setValidationErrors(array $validationErrors) : void
    {
        $this->validationErrors = $validationErrors;
    }

    /**
     * Returns the value of an attribute in the request URL
     *
     * @return array
     */
    public function getValidationErrors() : array
    {
        return $this->validationErrors;
    }

    /**
     * Returns the value of an attribute in the request URL
     *
     * @return bool
     */
    public function isValid() : bool
    {
        $validator = Validator::make($this->all(), $this->validationRules, $this->customErrorMessages);

        if ($validator->fails()) {
            $this->setValidationErrors($validator->errors()->all());
            return false;
        }

        return true;
    }
}
