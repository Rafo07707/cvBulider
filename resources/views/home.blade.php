@extends('layouts.app')

@section('content')
    <style>
        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .step {
            flex: 1;
            text-align: center;
        }

        .step.active {
            font-weight: bold;
        }

        .step .step-number {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .step .step-title {
            font-size: 0.875rem;
        }
    </style>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cv Creating Steps') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="text-center">
                        <div class="stepper">
                            <div class="step active">
                                <span class="step-number">1</span>
                                <span class="step-title">Step 1</span>
                            </div>
                            <div class="step">
                                <span class="step-number">2</span>
                                <span class="step-title">Step 2</span>
                            </div>
                            <div class="step">
                                <span class="step-number">3</span>
                                <span class="step-title">Step 3</span>
                            </div>
                        </div>

                        <!-- Your content for each step goes here -->
                        <div class="step-content" id="step1-content">
                            <h3>Profile Information</h3>
                            <p>Add your profile information for creating cv</p>
                        </div>

                        <div class="step-content" id="step2-content" style="display: none;">
                            <h3>Education</h3>
                            <p>Add your Educations</p>
                        </div>

                        <div class="step-content" id="step3-content" style="display: none;">
                            <h3>Experience</h3>
                            <p>Add your Experiences and make your Cv</p>
                            <!-- Move the Make Cv button inside the step-content of the 3rd step -->
                            <a class="btn btn-primary mt-3 mb-2" href="{{ route('user-detail.create') }}">Make Cv</a>
                        </div>

                        <div class="stepper-buttons mb-2">
                            <button class="btn btn-secondary" id="previousBtn">Previous</button>
                            <button class="btn btn-primary" id="nextBtn">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <script>
                        const steps = document.querySelectorAll('.step');
                        const stepContents = document.querySelectorAll('.step-content');
                        const previousBtn = document.getElementById('previousBtn');
                        const nextBtn = document.getElementById('nextBtn');
                        const makeCvBtn = document.getElementById('makeCvBtn'); // Add this line

                        let currentStep = 0;

                        steps.forEach((step, index) => {
                            step.addEventListener('click', () => {
                                setActiveStep(index);
                            });
                        });

                        previousBtn.addEventListener('click', () => {
                            if (currentStep > 0) {
                                currentStep--;
                                setActiveStep(currentStep);
                            }
                        });

                        nextBtn.addEventListener('click', () => {
                            if (currentStep < steps.length - 1) {
                                currentStep++;
                                setActiveStep(currentStep);
                            }
                            updateMakeCvButtonVisibility(); // Add this line
                        });

                        function setActiveStep(index) {
                            steps.forEach((step, stepIndex) => {
                                if (stepIndex === index) {
                                    step.classList.add('active');
                                    stepContents[stepIndex].style.display = 'block';
                                } else {
                                    step.classList.remove('active');
                                    stepContents[stepIndex].style.display = 'none';
                                }
                            });
                            updateMakeCvButtonVisibility(); // Add this line
                        }

                        function updateMakeCvButtonVisibility() {
                            if (currentStep === 2) {
                                nextBtn.style.display = 'none';
                                makeCvBtn.style.display = 'block';
                            } else {
                                makeCvBtn.style.display = 'none';
                            }
                        }
                    </script>

@endsection
