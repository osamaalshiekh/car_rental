@extends('layouts.home')

@section('title', 'FAQ')
@section('content')

    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">FAQ</h1>
            <div class="accordion" id="faqAccordion">
                @foreach($data as $rs)
                    <div class="card">
                        <div class="card-header" id="heading{{ $rs->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link faq-question" type="button" data-toggle="collapse" data-target="#collapse{{ $rs->id }}" aria-expanded="true" aria-controls="collapse{{ $rs->id }}">
                                    {{ $rs->question }}
                                </button>
                            </h2>
                        </div>

                        <div id="collapse{{ $rs->id }}" class="collapse" aria-labelledby="heading{{ $rs->id }}" data-parent="#faqAccordion">
                            <div class="card-body faq-answer">
                                {{ $rs->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .faq-question {
            font-size: 1.5rem; /* Increase the font size for the question */
        }
        .faq-answer {
            font-weight: bold; /* Make the answer text bold */
            font-size: 1.2rem; /* Optionally increase the font size for the answer */
        }
    </style>

@endsection
