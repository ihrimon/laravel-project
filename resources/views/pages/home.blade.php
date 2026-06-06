@extends('layouts.app')

@section('title', 'tanzid.dev — software developer')

@section('description', 'Md Tanzid Haque — full-stack developer. Laravel, React, Next.js.')

@section('content')

  @include('sections.hero')

  @include('sections.skills-marquee')

  @include('sections.about')

  @include('sections.experience')

  @include('sections.projects')

  @include('sections.skills')

  @include('sections.writing')

  @include('sections.principles')

  @include('sections.education-language')

  @include('sections.contact')

@endsection