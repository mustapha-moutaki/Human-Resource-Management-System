@extends('layouts.app')

@section('title', 'Organization Chart')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/organizational.css') }}">
@endsection

@section('content')
<div class="container">
  <h1 class="level-1 rectangle">CEO</h1>
  <ol class="level-2-wrapper">
    <li>
      <h2 class="level-2 rectangle">Director A</h2>
      <ol class="level-3-wrapper">
        <li>
          <h3 class="level-3 rectangle">Manager A</h3>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">Person A</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person B</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person C</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person D</h4>
            </li>
          </ol>
        </li>
        <li>
          <h3 class="level-3 rectangle">Manager B</h3>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">Person A</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person B</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person C</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person D</h4>
            </li>
          </ol>
        </li>
      </ol>
    </li>
    <li>
      <h2 class="level-2 rectangle">Director B</h2>
      <ol class="level-3-wrapper">
        <li>
          <h3 class="level-3 rectangle">Manager C</h3>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">Person A</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person B</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person C</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person D</h4>
            </li>
          </ol>
        </li>
        <li>
          <h3 class="level-3 rectangle">Manager D</h3>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">Person A</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person B</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person C</h4>
            </li>
            <li>
              <h4 class="level-4 rectangle">Person D</h4>
            </li>
          </ol>
        </li>
      </ol>
    </li>
  </ol>
</div>
@endsection