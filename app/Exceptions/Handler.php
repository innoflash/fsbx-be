<?php

namespace App\Exceptions;

use App\Concerns\FSBXResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    use FSBXResponse;

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Class - error code key maps.
     * @var array
     */
    private array $errorCodes = [
        ValidationException::class    => 422,
        RouteNotFoundException::class => 404,
    ];

    private array $errorMessages = [
        NotFoundHttpException::class  => 'Invalid route',
        RouteNotFoundException::class => 'Authorization headers missing',
    ];
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $exception, Request $request) {
            if (in_array('getMessage', get_class_methods($exception)) && strlen($exception->getMessage())) {
                $message = $exception->getMessage();
            } else {
                $message = 'Unknown server error.';
            }

            $message = $this->errorMessages[get_class($exception)] ?? $message;

            $statusCode = $this->errorCodes[get_class($exception)] ?? 500;

            if (in_array('getStatusCode', get_class_methods($exception))) {
                $statusCode = $exception->getStatusCode();
            }

            if ($exception instanceof ValidationException) {
                $errors = collect($exception->errors())->flatten()->toArray();
                $message = implode(PHP_EOL, $errors);
            }

            if($request->expectsJson()){
                return $this->response(
                    status:'error',
                    message: $message,
                    data: $exception,
                    statusCode: $statusCode
                );
            }
        });
    }
}
