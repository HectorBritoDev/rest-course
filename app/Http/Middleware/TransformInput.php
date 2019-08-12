<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\ValidationException;

class TransformInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $transformer)
    {
        $transformedInputs = [];
        foreach ($request->all() as $input => $value) {
            $transformedInputs[$transformer::originalAttributes($input)] = $value;
        }
        //dd($transformer::originalAttributes($input));
        $request->replace($transformedInputs);

        // dd($request->request->all());
        $response = $next($request);

        if (isset($response->exception) && $response->exception instanceof ValidationException) {
            $data = $response->getData();
            $transformedErrors = [];

            foreach ($data->error as $field => $error) {
                $transformedField = $transformer::transformedAttributes($field);
                $transformedErrors[$transformedField] = str_replace($field, $transformedField, $error);
            }

//dd($response->getData());
            $data->error = $transformedErrors;
            $response->setData($data);
        }
        return $response;
    }
}
