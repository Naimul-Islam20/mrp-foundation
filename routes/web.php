<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/our-inception', function () {
    return view('our-inception');
})->name('our-inception');

Route::get('/mission-vision', function () {
    return view('mission-vision');
})->name('mission-vision');

Route::get('/certification', function () {
    return view('certification');
})->name('certification');

Route::get('/event', function () {
    return view('event');
})->name('event');

Route::get('/event-details', function () {
    return view('event-details');
})->name('event-details');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/our-partner', function () {
    return view('our-partner');
})->name('our-partner');

Route::get('/career', function () {
    return view('career');
})->name('career');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/agent-requirements', function () {
    return view('agent-requirements');
})->name('agent-requirements');

Route::get('/become-agent', function () {
    return view('become-agent');
})->name('become-agent');

Route::get('/become-member', function () {
    return view('become-member');
})->name('become-member');

Route::get('/become-sub-agent', function () {
    return view('become-sub-agent');
})->name('become-sub-agent');
