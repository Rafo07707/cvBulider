@extends('layouts.app')

@section('content')
    <style>
        .stars {
            font-size: 30px;
        }

        .stars i {
            color: grey;
        }

        .stars input[type="radio"] {
            display: none;
        }
    </style>
    <div class="container">
        <form method="POST" action="/skills" class="w-50">
            @csrf
            <div class="mb-3">
                <label for="name">Skill Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="stars">
                    <input type="hidden" name="rating" id="rating-value" value="" />
                    <i class="bi bi-star" data-rating="1"></i>
                    <i class="bi bi-star" data-rating="2"></i>
                    <i class="bi bi-star" data-rating="3"></i>
                    <i class="bi bi-star" data-rating="4"></i>
                    <i class="bi bi-star" data-rating="5"></i>
                </div>
                @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        const stars = document.querySelectorAll('.stars i');
        const ratingValue = document.getElementById('rating-value');

        function handleStarSelection() {
            const selectedRating = this.getAttribute('data-rating');
            ratingValue.value = selectedRating;

            stars.forEach((star) => {
                if (star.getAttribute('data-rating') <= selectedRating) {
                    star.style.color = 'yellow';
                } else {
                    star.style.color = 'grey';
                }
            });
        }

        stars.forEach((star) => {
            star.addEventListener('click', handleStarSelection);
        });
    </script>
@endsection
