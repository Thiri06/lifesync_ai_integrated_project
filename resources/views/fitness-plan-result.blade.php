<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Personalized Fitness Plan') }}
        </h2>
    </x-slot>

    <!-- Add Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <div class="py-5" style="background-color: #f1eefc;">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <strong><i class="fas fa-check-circle me-2"></i>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(isset($fitnessProfile) && isset($fitnessPlanResult))
                <!-- Main Content Card -->
                <div class="card border-0 shadow-lg rounded-4 mb-5 overflow-hidden">
                    <!-- Header Banner -->
                    <div class="card-header text-white p-4 p-md-5" style="background: linear-gradient(135deg, #592fde 0%, #d959e5 100%);">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h1 class="display-5 fw-bold mb-0">Your 30-Day Fitness Journey</h1>
                                <p class="lead opacity-75 mt-2 mb-0">Personalized plan based on your goals and preferences</p>
                            </div>
                            <div class="col-md-4 d-none d-md-flex justify-content-end">
                                <div class="rounded-circle bg-white bg-opacity-10 p-4">
                                    <i class="fas fa-dumbbell fa-3x text-white opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <div class="row g-4">
                            <!-- Profile Summary Column -->
                            <div class="col-lg-4">
                                <div class="card h-100 border-0 shadow-sm rounded-4" style="background-color: #f8f5ff;">
                                    <div class="card-header border-0 py-3" style="background-color: #592fde; color: white;">
                                        <h3 class="fs-5 fw-bold mb-0">
                                            <i class="fas fa-user-circle me-2"></i> Your Fitness Profile
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush bg-transparent">
                                            <li class="list-group-item d-flex align-items-center border-0 px-0 py-3 bg-transparent">
                                                <span class="badge rounded-pill p-2 me-3" style="background-color: #592fde;">
                                                    <i class="fas fa-bullseye text-white"></i>
                                                </span>
                                                <div>
                                                    <small class="text-muted d-block">Fitness Goal</small>
                                                    <span class="fw-medium">{{ ucfirst(str_replace('_', ' ', $fitnessProfile->fitness_goals)) }}</span>
                                                </div>
                                            </li>
                                            
                                            <li class="list-group-item d-flex align-items-center border-0 px-0 py-3 bg-transparent">
                                                <span class="badge rounded-pill p-2 me-3" style="background-color: #d38ded;">
                                                    <i class="fas fa-signal text-white"></i>
                                                </span>
                                                <div>
                                                    <small class="text-muted d-block">Fitness Level</small>
                                                    <span class="fw-medium">{{ ucfirst($fitnessProfile->fitness_level) }}</span>
                                                </div>
                                            </li>
                                            
                                            <li class="list-group-item d-flex align-items-center border-0 px-0 py-3 bg-transparent">
                                                <span class="badge rounded-pill p-2 me-3" style="background-color: #d959e5;">
                                                    <i class="fas fa-running text-white"></i>
                                                </span>
                                                <div>
                                                    <small class="text-muted d-block">Workout Types</small>
                                                    <span class="fw-medium">{{ implode(', ', json_decode($fitnessProfile->workout_types)) }}</span>
                                                </div>
                                            </li>
                                            
                                            <li class="list-group-item d-flex align-items-center border-0 px-0 py-3 bg-transparent">
                                                <span class="badge rounded-pill p-2 me-3" style="background-color: #592fde;">
                                                    <i class="fas fa-map-marker-alt text-white"></i>
                                                </span>
                                                <div>
                                                    <small class="text-muted d-block">Environment</small>
                                                    <span class="fw-medium">{{ ucfirst($fitnessProfile->workout_environment) }}</span>
                                                </div>
                                            </li>
                                            
                                            <li class="list-group-item d-flex align-items-center border-0 px-0 py-3 bg-transparent">
                                                <span class="badge rounded-pill p-2 me-3" style="background-color: #d38ded;">
                                                    <i class="fas fa-clock text-white"></i>
                                                </span>
                                                <div>
                                                    <small class="text-muted d-block">Workout Time</small>
                                                    <span class="fw-medium">{{ str_replace('_', ' ', ucfirst($fitnessProfile->workout_time)) }}</span>
                                                </div>
                                            </li>
                                            
                                            <li class="list-group-item d-flex align-items-center border-0 px-0 py-3 bg-transparent">
                                                <span class="badge rounded-pill p-2 me-3" style="background-color: #d959e5;">
                                                    <i class="fas fa-calendar-alt text-white"></i>
                                                </span>
                                                <div>
                                                    <small class="text-muted d-block">Workout Frequency</small>
                                                    <span class="fw-medium">{{ str_replace('_', ' ', ucfirst($fitnessProfile->workout_frequency)) }}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- AI Generated Plan Column -->
                            <div class="col-lg-8">
                                <div class="card h-100 border-0 shadow-sm rounded-4">
                                    <div class="card-header d-flex justify-content-between align-items-center py-3" 
                                         style="background-color: #f8f5ff; border-bottom: 2px solid #592fde;">
                                        <h3 class="fs-5 fw-bold mb-0" style="color: #592fde;">
                                            <i class="fas fa-lightbulb me-2" style="color: #d959e5;"></i> Your AI-Generated Fitness Plan
                                        </h3>
                                        <span class="badge rounded-pill px-3 py-2" style="background-color: #592fde;">30 Days</span>
                                    </div>
                                    
                                    <div class="card-body p-4">
                                        <div class="fitness-plan-content" style="max-height: 500px; overflow-y: auto;">
                                            {!! nl2br(e($fitnessPlanResult->ai_response)) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3 mt-4 pt-4 border-top">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                            </a>
                            
                            <div class="d-flex gap-2">
                                <a href="{{ route('fitness.download', ['id' => $fitnessProfile->id]) }}" class="btn btn-primary" style="background-color: #592fde; border-color: #592fde;">
                                    <i class="fas fa-download me-2"></i> Download PDF
                                </a>
                                
                                <button id="share-plan-btn" class="btn btn-outline-primary" style="color: #592fde; border-color: #592fde;">
                                    <i class="fas fa-share-alt me-2"></i> Share Plan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Resources Section -->
                <h3 class="fs-4 fw-bold mb-4" style="color: #592fde;">Helpful Resources</h3>
                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="d-inline-block p-3 rounded-circle mb-3" style="background-color: rgba(89, 47, 222, 0.1);">
                                    <i class="fas fa-book fa-2x" style="color: #592fde;"></i>
                                </div>
                                <h4 class="fs-5 fw-bold mb-3">Fitness Tips</h4>
                                <p class="text-muted mb-3">Learn proper form and techniques to maximize your workout effectiveness and prevent injuries.</p>
                                <a href="#" class="text-decoration-none fw-medium" style="color: #592fde;">Read more <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="d-inline-block p-3 rounded-circle mb-3" style="background-color: rgba(211, 141, 237, 0.1);">
                                    <i class="fas fa-chart-line fa-2x" style="color: #d38ded;"></i>
                                </div>
                                <h4 class="fs-5 fw-bold mb-3">Track Progress</h4>
                                <p class="text-muted mb-3">Monitor your fitness journey with our tracking tools to stay motivated and see your improvements.</p>
                                <a href="#" class="text-decoration-none fw-medium" style="color: #d38ded;">Start tracking <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="d-inline-block p-3 rounded-circle mb-3" style="background-color: rgba(217, 89, 229, 0.1);">
                                    <i class="fas fa-users fa-2x" style="color: #d959e5;"></i>
                                </div>
                                <h4 class="fs-5 fw-bold mb-3">Community Support</h4>
                                <p class="text-muted mb-3">Join our fitness community to share experiences, get advice, and stay motivated with like-minded people.</p>
                                <a href="#" class="text-decoration-none fw-medium" style="color: #d959e5;">Join community <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card border-0 shadow-lg rounded-4 text-center p-5">
                    <div class="py-5">
                        <div class="d-inline-block p-3 rounded-circle mb-4" style="background-color: #ffecef;">
                            <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
                        </div>
                        <h2 class="fs-1 fw-bold mb-3">No Fitness Plan Found</h2>
                        <p class="text-muted mb-4 mx-auto" style="max-width: 500px;">It looks like you haven't created a fitness plan yet or the plan you're looking for doesn't exist.</p>
                        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-primary px-5 py-3" style="background-color: #592fde; border-color: #592fde;">
                            <i class="fas fa-home me-2"></i> Return to Dashboard
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        /* Custom styles using the provided color scheme */
        body {
            font-family: 'Inter', sans-serif;
            color: #070419;
        }
        
        .rounded-4 {
            border-radius: 1rem !important;
        }
        
        /* Custom scrollbar for plan content */
        .fitness-plan-content::-webkit-scrollbar {
            width: 8px;
        }
        
        .fitness-plan-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .fitness-plan-content::-webkit-scrollbar-thumb {
            background: #d38ded;
            border-radius: 10px;
        }
        
        .fitness-plan-content::-webkit-scrollbar-thumb:hover {
            background: #592fde;
        }
        
        /* Typography enhancements for the plan content */
        .fitness-plan-content {
            line-height: 1.7;
            font-size: 1rem;
        }
        
        .fitness-plan-content h1, 
        .fitness-plan-content h2,
        .fitness-plan-content h3, 
        .fitness-plan-content h4 {
            color: #592fde;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }
        
        .fitness-plan-content h1 {
            font-size: 1.5rem;
        }
        
        .fitness-plan-content h2 {
            font-size: 1.25rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #f1eefc;
        }
        
        .fitness-plan-content h3 {
            font-size: 1.125rem;
        }
        
        .fitness-plan-content p {
            margin-bottom: 1rem;
        }
        
        .fitness-plan-content ul, 
        .fitness-plan-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .fitness-plan-content li {
            margin-bottom: 0.5rem;
        }
        
        .fitness-plan-content strong {
            color: #070419;
            font-weight: 600;
        }
        
        /* Button hover effects */
        .btn-primary:hover {
            background-color: #4a26b9 !important;
            border-color: #4a26b9 !important;
        }
        
        .btn-outline-primary:hover {
            background-color: #592fde !important;
            color: white !important;
        }
        
        /* Card hover effect */
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(89, 47, 222, 0.1) !important;
        }
        
        /* Badge styles */
        .badge {
            font-weight: 500;
        }
    </style>

    <!-- Add Bootstrap 5 JS and Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    
    <script>
        // Share functionality
        document.getElementById('share-plan-btn')?.addEventListener('click', function() {
            if (navigator.share) {
                navigator.share({
                    title: 'My Personalized Fitness Plan',
                    text: 'Check out my personalized 30-day fitness plan from LifeSync!',
                    url: window.location.href,
                })
                .catch((error) => console.log('Error sharing:', error));
            } else {
                // Fallback for browsers that don't support the Web Share API
                const shareUrl = window.location.href;
                
                // Create a Bootstrap modal for sharing
                const modalHtml = `
                    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #592fde; color: white;">
                                    <h5 class="modal-title" id="shareModalLabel">Share Your Fitness Plan</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Copy the link below to share your personalized fitness plan:</p>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="shareUrlInput" value="${shareUrl}" readonly>
                                        <button class="btn btn-primary" type="button" id="copyLinkBtn" style="background-color: #592fde; border-color: #592fde;">
                                            <i class="fas fa-copy"></i> Copy
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-center gap-3 mt-4">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}" target="_blank" class="btn btn-outline-primary" style="color: #3b5998; border-color: #3b5998;">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?url=${encodeURIComponent(shareUrl)}&text=${encodeURIComponent('Check out my personalized fitness plan!')}" target="_blank" class="btn btn-outline-primary" style="color: #1da1f2; border-color: #1da1f2;">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="https://wa.me/?text=${encodeURIComponent('Check out my personalized fitness plan: ' + shareUrl)}" target="_blank" class="btn btn-outline-primary" style="color: #25d366; border-color: #25d366;">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                        <a href="mailto:?subject=${encodeURIComponent('My Personalized Fitness Plan')}&body=${encodeURIComponent('Check out my personalized fitness plan: ' + shareUrl)}" class="btn btn-outline-primary" style="color: #d44638; border-color: #d44638;">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                // Append modal to body if it doesn't exist
                if (!document.getElementById('shareModal')) {
                    document.body.insertAdjacentHTML('beforeend', modalHtml);
                    
                    // Add copy functionality
                    document.getElementById('copyLinkBtn').addEventListener('click', function() {
                        const shareUrlInput = document.getElementById('shareUrlInput');
                        shareUrlInput.select();
                        document.execCommand('copy');
                        
                        // Change button text temporarily
                        const originalHtml = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check"></i> Copied!';
                        setTimeout(() => {
                            this.innerHTML = originalHtml;
                        }, 2000);
                    });
                }
                
                // Show the modal
                const shareModal = new bootstrap.Modal(document.getElementById('shareModal'));
                shareModal.show();
            }
        });
        
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</x-app-layout>