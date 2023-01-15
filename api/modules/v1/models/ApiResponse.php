<?php

namespace api\modules\v1\models;

use Yii;

/**
 * Signup form
 */
class ApiResponse
{
    public $name;
    public $message;
    public $code;
    public $data;
    public $pagination;


    const UNKNOWN_RESPONSE = 0;
    const SUCCESSFUL = 200;
    const NON_AUTHORITATIVE = 203;
    const NO_CONTENT = 204;
    const VALIDATION_ERROR = 303;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const PAYMENT_REQUIRED = 402;
    const REQUEST_FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const UNABLE_TO_PERFORM_ACTION = 406;
    const ALREADY_TAKEN = 409;
    const REQUEST_GONE = 410;
    const UNKNOWN_ERROR = 666;


    private $codes = [
        self::UNKNOWN_RESPONSE => "Unknown response",
        self::SUCCESSFUL => "Success",
        self::UNAUTHORIZED => "Unauthorized",
        self::NOT_FOUND => "Not found",
        self::UNABLE_TO_PERFORM_ACTION => "Unable to perform action",
        self::REQUEST_GONE => "Request no longer exist",
        self::NON_AUTHORITATIVE => "No authority for this request",
        self::NO_CONTENT => "No record found",
        self::UNKNOWN_ERROR => "Something unknown went wrong",
        self::VALIDATION_ERROR => "There is validation error",
    ];

    function message($name = null, $message = null, $code = null, $models = null, $pagination = null)
    {
        $this->name = $name;
        $this->message = $message ? $message : $this->getMessage($code);
        $this->code = $code ? $code : 999;
        $this->data = $models;
        if (!empty($pagination))
            $this->pagination = $this->paginate($pagination);
        else
            unset($this->pagination);

        return $this;
    }

    function success($models = null, $code = null, $message = null, $pagination = null)
    {
        //Yii::$app->response->statusCode = $code;
        return $this->message("success", $message, $code ? $code : self::SUCCESSFUL, $models,$pagination);
    }

    function error($models = null, $code = null, $message = null)
    {
        //Yii::$app->response->statusCode = $code;
        return $this->message("error", $message, $code ? $code : self::EXPECTATION_FAILED, $models);
    }

    function underconstruction()
    {
        //Yii::$app->response->statusCode = self::STILL_UNDER_CONSTRUCTION;
        return $this->error(null, self::STILL_UNDER_CONSTRUCTION);
    }

    function unauthorized()
    {
        //Yii::$app->response->statusCode = self::UNAUTHORIZED;
        return $this->error(null, self::UNAUTHORIZED);
    }

    function getMessage($code = 0)
    {
        return $this->codes[$code];
    }

    function paginate($pagination)
    {
        $pagesize = $pagination->pagination->pageSize;
        $total = $pagination->totalCount;
        return [
            'pageSize' => $pagesize,
            'totalCount' => $total,
            'pageCount' => (int)(($total + $pagesize - 1) / $pagesize),
            'currentPage' => $pagination->pagination->page + 1
        ];
    }
}
