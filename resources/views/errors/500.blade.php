@php
    /**
     * @var \Exception $exception
     */
    if (!isset($exception)) {
        $exception = new \Exception('Server Error');
    }
    if($exception->getPrevious()){
        $exception = $exception->getPrevious();
    }

    $message = $exception->getCode();
    if((bool)$message){
        $message = __('Code') . ': ' . $message . ' - ' . __(class_basename($exception));
    }else{
        $message = $exception->getMessage();
    }
@endphp
@extends('errors::minimal')

@section('title', __(class_basename($exception)))
@section('code', '500')

@section('message', $message)
