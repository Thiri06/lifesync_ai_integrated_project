<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LifeSync - Your AI-Powered Wellness Companion</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTYgMkM4LjI2OCAyIDIgOC4yNjggMiAxNkMyIDIzLjczMiA4LjI2OCAzMCAxNiAzMEMyMy43MzIgMzAgMzAgMjMuNzMyIDMwIDE2QzMwIDguMjY4IDIzLjczMiAyIDE2IDJaIiBmaWxsPSIjNTkyZmRlIiBmaWxsLW9wYWNpdHk9IjAuMSIvPjxwYXRoIGQ9Ik0xNiA2QzEwLjQ3NyA2IDYgMTAuNDc3IDYgMTZDNiAyMS41MjMgMTAuNDc3IDI2IDE2IDI2QzIxLjUyMyAyNiAyNiAyMS41MjMgMjYgMTZDMjYgMTAuNDc3IDIxLjUyMyA2IDE2IDZaIiBmaWxsPSIjNTkyZmRlIiBmaWxsLW9wYWNpdHk9IjAuMiIvPjxwYXRoIGQ9Ik0xNiAxMEMxMi42ODYgMTAgMTAgMTIuNjg2IDEwIDE2QzEwIDE5LjMxNCAxMi42ODYgMjIgMTYgMjJDMTkuMzE0IDIyIDIyIDE5LjMxNCAyMiAxNkMyMiAxMi42ODYgMTkuMzE0IDEwIDE2IDEwWiIgZmlsbD0iIzU5MmZkZSIvPjxwYXRoIGQ9Ik0xNiAxNEMxNC44OTUgMTQgMTQgMTQuODk1IDE0IDE2QzE0IDE3LjEwNSAxNC44OTUgMTggMTYgMThDMTcuMTA1IDE4IDE4IDE3LjEwNSAxOCAxNkMxOCAxNC44OTUgMTcuMTA1IDE0IDE2IDE0WiIgZmlsbD0id2hpdGUiLz48cGF0aCBkPSJNMjQgOUMyNyAxMC4xMDQ2IDIzLjEwNDYgMTEgMjIgMTFDMjAuODk1NCAxMSAyMCAxMC4xMDQ2IDIwIDlDMjAgNy44OTU0MyAyMC44OTU0IDcgMjIgN0MyMy4xMDQ2IDcgMjQgNy44OTU0MyAyNCA5WiIgZmlsbD0iI2Q5NTllNSIvPjxwYXRoIGQ9Ik0xMiAyM0MxMiAyNC4xMDQ2IDExLjEwNDYgMjUgMTAgMjVDOC44OTU0MyAyNSA4IDI0LjEwNDYgOCAyM0M4IDIxLjg5NTQgOC44OTU0MyAyMSAxMCAyMUMxMS4xMDQ2IDIxIDEyIDIxLjg5NTQgMTIgMjNaIiBmaWxsPSIjZDM4ZGVkIi8+PC9zdmc+" />
    <link rel="apple-touch-icon" href="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTYgMkM4LjI2OCAyIDIgOC4yNjggMiAxNkMyIDIzLjczMiA4LjI2OCAzMCAxNiAzMEMyMy43MzIgMzAgMzAgMjMuNzMyIDMwIDE2QzMwIDguMjY4IDIzLjczMiAyIDE2IDJaIiBmaWxsPSIjNTkyZmRlIiBmaWxsLW9wYWNpdHk9IjAuMSIvPjxwYXRoIGQ9Ik0xNiA2QzEwLjQ3NyA2IDYgMTAuNDc3IDYgMTZDNiAyMS41MjMgMTAuNDc3IDI2IDE2IDI2QzIxLjUyMyAyNiAyNiAyMS41MjMgMjYgMTZDMjYgMTAuNDc3IDIxLjUyMyA2IDE2IDZaIiBmaWxsPSIjNTkyZmRlIiBmaWxsLW9wYWNpdHk9IjAuMiIvPjxwYXRoIGQ9Ik0xNiAxMEMxMi42ODYgMTAgMTAgMTIuNjg2IDEwIDE2QzEwIDE5LjMxNCAxMi42ODYgMjIgMTYgMjJDMTkuMzE0IDIyIDIyIDE5LjMxNCAyMiAxNkMyMiAxMi42ODYgMTkuMzE0IDEwIDE2IDEwWiIgZmlsbD0iIzU5MmZkZSIvPjxwYXRoIGQ9Ik0xNiAxNEMxNC44OTUgMTQgMTQgMTQuODk1IDE0IDE2QzE0IDE3LjEwNSAxNC44OTUgMTggMTYgMThDMTcuMTA1IDE4IDE4IDE3LjEwNSAxOCAxNkMxOCAxNC44OTUgMTcuMTA1IDE0IDE2IDE0WiIgZmlsbD0id2hpdGUiLz48cGF0aCBkPSJNMjQgOUMyNyAxMC4xMDQ2IDIzLjEwNDYgMTEgMjIgMTFDMjAuODk1NCAxMSAyMCAxMC4xMDQ2IDIwIDlDMjAgNy44OTU0MyAyMC44OTU0IDcgMjIgN0MyMy4xMDQ2IDcgMjQgNy44OTU0MyAyNCA5WiIgZmlsbD0iI2Q5NTllNSIvPjxwYXRoIGQ9Ik0xMiAyM0MxMiAyNC4xMDQ2IDExLjEwNDYgMjUgMTAgMjVDOC44OTU0MyAyNSA4IDI0LjEwNDYgOCAyM0M4IDIxLjg5NTQgOC44OTU0MyAyMSAxMCAyMUMxMS4xMDQ2IDIxIDEyIDIxLjg5NTQgMTIgMjNaIiBmaWxsPSIjZDM4ZGVkIi8+PC9zdmc+" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --background: #f1eefc;
            --primary: #592fde;
            --secondary: #d38ded;
            --accent: #d959e5;
            --text: #070419;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: var(--text);
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 5px;
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: -3px;
            left: 0;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, #4a26b9 100%);
            border: none;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(89, 47, 222, 0.2);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #4a26b9 0%, var(--primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(89, 47, 222, 0.3);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border: none;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(211, 141, 237, 0.2);
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, var(--accent) 0%, var(--secondary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(211, 141, 237, 0.3);
        }
        
        .btn-outline-primary {
            color: var(--primary);
            border: 2px solid var(--primary);
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(89, 47, 222, 0.2);
        }
        
        .hero-section {
            padding: 140px 0 100px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(180deg, var(--background) 0%, rgba(241, 238, 252, 0.8) 100%);
        }
        
        .hero-blob-1 {
            position: absolute;
            top: -150px;
            right: -100px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(211, 141, 237, 0.15) 0%, rgba(217, 89, 229, 0.15) 100%);
            filter: blur(40px);
            z-index: 0;
            animation: float 8s ease-in-out infinite;
        }
        
        .hero-blob-2 {
            position: absolute;
            bottom: -200px;
            left: -150px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(89, 47, 222, 0.15) 0%, rgba(211, 141, 237, 0.15) 100%);
            filter: blur(50px);
            z-index: 0;
            animation: float 10s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(20px, 20px) rotate(5deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }
        
        .hero-title {
            font-weight: 800;
            font-size: 3.8rem;
            margin-bottom: 1.5rem;
            color: var(--text);
            line-height: 1.2;
            position: relative;
            z-index: 1;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: rgba(7, 4, 25, 0.8);
            position: relative;
            z-index: 1;
        }
        
        .hero-image {
            position: relative;
            z-index: 1;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(89, 47, 222, 0.2);
            transform: perspective(1000px) rotateY(-5deg);
            transition: all 0.5s ease;
            overflow: hidden;
        }
        
        .hero-image:hover {
            transform: perspective(1000px) rotateY(0deg);
        }
        
        .hero-image img {
            border-radius: 20px;
            transition: all 0.5s ease;
        }
        
        .hero-image:hover img {
            transform: scale(1.03);
        }
        
        .feature-section {
            padding: 100px 0;
            position: relative;
        }
        
        .section-title {
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--text);
            position: relative;
            display: inline-block;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            bottom: -10px;
            left: 0;
            border-radius: 2px;
        }
        
        .text-center .section-title:after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            color: rgba(7, 4, 25, 0.7);
        }
        
        .feature-card {
            background-color: white;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
            overflow: hidden;
            border: 1px solid rgba(241, 238, 252, 0.5);
        }
        
        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(89, 47, 222, 0.1);
            border-color: rgba(89, 47, 222, 0.2);
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            z-index: 2;
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            margin-bottom: 25px;
            background-color: rgba(89, 47, 222, 0.1);
            color: var(--primary);
            font-size: 28px;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            background-color: var(--primary);
            color: white;
            transform: scale(1.1);
        }
        
        .feature-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--text);
        }
        
        .how-it-works-section {
            padding: 100px 0;
            background-color: white;
            position: relative;
            overflow: hidden;
        }
        
        .how-it-works-blob {
            position: absolute;
            top: 50%;
            right: -300px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(89, 47, 222, 0.05) 0%, rgba(217, 89, 229, 0.05) 100%);
            filter: blur(50px);
            z-index: 0;
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            margin-right: 20px;
            flex-shrink: 0;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .step-content {
            flex-grow: 1;
        }
        
        .step-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--text);
        }
        
        .app-screenshot {
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
            transition: all 0.5s ease;
            transform: perspective(1000px) rotateY(5deg);
        }
        
        .app-screenshot:hover {
            transform: perspective(1000px) rotateY(0deg) translateY(-10px);
            box-shadow: 0 40px 70px rgba(89, 47, 222, 0.15);
        }
        
        .testimonial-section {
            background-color: white;
            padding: 100px 0;
            position: relative;
        }
        
        .testimonial-card {
            background-color: var(--background);
            border-radius: 20px;
            padding: 35px;
            margin: 20px 0;
            position: relative;
            transition: all 0.3s ease;
            border: 1px solid rgba(241, 238, 252, 0.5);
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            border-color: rgba(89, 47, 222, 0.2);
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            position: relative;
            padding-left: 25px;
        }
        
        .testimonial-text:before {
            content: '"';
            font-size: 60px;
            color: var(--primary);
            opacity: 0.2;
            position: absolute;
            top: -20px;
            left: -10px;
            font-family: Georgia, serif;
        }
        
        .testimonial-author {
            font-weight: 600;
            color: var(--primary);
        }
        
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            padding: 100px 0;
            color: white;
            border-radius: 30px;
            margin: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .cta-blob-1 {
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            filter: blur(30px);
        }
        .cta-blob-2 {
            position: absolute;
            bottom: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            filter: blur(30px);
        }
        
        .cta-title {
            font-weight: 800;
            font-size: 3rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }
        
        .cta-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        .btn-light {
            background-color: white;
            color: var(--primary);
            font-weight: 600;
            padding: 15px 35px;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }
        
        .btn-light:hover {
            background-color: rgba(255, 255, 255, 0.95);
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .footer {
            padding: 80px 0 40px;
            background-color: white;
            position: relative;
        }
        
        .footer-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 25px;
            color: var(--primary);
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: var(--text);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .footer-links a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: rgba(89, 47, 222, 0.1);
            color: var(--primary);
            margin-right: 12px;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        
        .social-icon:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(89, 47, 222, 0.2);
        }
        
        .copyright {
            padding: 10px;
            border-top: 1px solid rgba(7, 4, 25, 0.1);
            margin: 10px;
            margin-bottom: none;
            color: rgba(7, 4, 25, 0.7);
        }
        
        .floating-element {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        .feature-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }
        
        .scroll-down {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--primary);
            font-size: 1.5rem;
            animation: bounce 2s infinite;
            cursor: pointer;
            z-index: 10;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0) translateX(-50%); }
            40% { transform: translateY(-20px) translateX(-50%); }
            60% { transform: translateY(-10px) translateX(-50%); }
        }
        
        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.8rem;
            }
            
            .hero-section {
                padding: 100px 0 80px;
            }
            
            .feature-card {
                margin-bottom: 30px;
            }
            
            .cta-title {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 767.98px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .hero-blob-1, .hero-blob-2 {
                opacity: 0.5;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                    <path d="M16 2C8.268 2 2 8.268 2 16C2 23.732 8.268 30 16 30C23.732 30 30 23.732 30 16C30 8.268 23.732 2 16 2Z" fill="#592fde" fill-opacity="0.1"/>
                    <path d="M16 6C10.477 6 6 10.477 6 16C6 21.523 10.477 26 16 26C21.523 26 26 21.523 26 16C26 10.477 21.523 6 16 6Z" fill="#592fde" fill-opacity="0.2"/>
                    <path d="M16 10C12.686 10 10 12.686 10 16C10 19.314 12.686 22 16 22C19.314 22 22 19.314 22 16C22 12.686 19.314 10 16 10Z" fill="#592fde"/>
                    <path d="M16 14C14.895 14 14 14.895 14 16C14 17.105 14.895 18 16 18C17.105 18 18 17.105 18 16C18 14.895 17.105 14 16 14Z" fill="white"/>
                    <path d="M24 9C24 10.1046 23.1046 11 22 11C20.8954 11 20 10.1046 20 9C20 7.89543 20.8954 7 22 7C23.1046 7 24 7.89543 24 9Z" fill="#d959e5"/>
                    <path d="M12 23C12 24.1046 11.1046 25 10 25C8.89543 25 8 24.1046 8 23C8 21.8954 8.89543 21 10 21C11.1046 21 12 21.8954 12 23Z" fill="#d38ded"/>
                </svg>
                <span style="font-weight: 800; background: linear-gradient(135deg, #592fde 0%, #d959e5 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">LifeSync</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary" href="{{ route('register') }}">Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-blob-1"></div>
        <div class="hero-blob-2"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="hero-title">Your AI-Powered <span style="color: var(--primary);">Wellness</span> Companion</h1>
                    <p class="hero-subtitle">LifeSync uses advanced AI to provide personalized fitness, nutrition, and mental wellness recommendations tailored just for you.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('login') }}" class="btn btn-primary me-3">Start Your Journey</a>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1594882645126-14020914d58d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1485&q=80" alt="LifeSync App" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <a href="#features" class="scroll-down">
            <i class="fas fa-chevron-down"></i>
        </a>
    </section>

    <!-- Features Section -->
    <section class="feature-section" id="features">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Personalized Wellness at Your Fingertips</h2>
                <p class="section-subtitle mx-auto" style="max-width: 700px;">LifeSync combines cutting-edge AI technology with proven wellness practices to help you achieve your health goals.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <span class="feature-badge">Popular</span>
                        <div class="feature-icon">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <h3 class="feature-title">AI Fitness Plans</h3>
                        <p>Get customized workout routines based on your goals, fitness level, and available equipment. Our AI adapts as you progress.</p>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon" style="background-color: rgba(211, 141, 237, 0.1); color: var(--secondary);">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <h3 class="feature-title">Nutrition Guidance</h3>
                        <p>Receive personalized meal plans and nutritional advice tailored to your dietary preferences and health goals.</p>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon" style="background-color: rgba(217, 89, 229, 0.1); color: var(--accent);">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3 class="feature-title">Mental Wellness</h3>
                        <p>Track your mood patterns and get AI-powered recommendations to improve your mental well-being and reduce stress.</p>
                    </div>
                </div>
                
                <div class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <span class="feature-badge">New</span>
                        <div class="feature-icon" style="background-color: rgba(89, 47, 222, 0.1); color: var(--primary);">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h3 class="feature-title">AI Assistant</h3>
                        <p>Chat with our AI wellness assistant to get instant answers to all your health and fitness questions anytime.</p>
                    </div>
                </div>
                
                <div class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon" style="background-color: rgba(211, 141, 237, 0.1); color: var(--secondary);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title">Progress Tracking</h3>
                        <p>Monitor your wellness journey with detailed analytics and visualizations of your progress over time.</p>
                    </div>
                </div>
                
                <div class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card">
                        <div class="feature-icon" style="background-color: rgba(217, 89, 229, 0.1); color: var(--accent);">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="feature-title">Community Support</h3>
                        <p>Connect with like-minded individuals on similar wellness journeys for motivation and support.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works-section">
        <div class="how-it-works-blob"></div>
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">How LifeSync Works</h2>
                <p class="section-subtitle mx-auto" style="max-width: 700px;">Our AI-powered platform makes achieving your wellness goals simpler than ever before.</p>
            </div>
            
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="app-screenshot floating-element">
                        <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="LifeSync App Demo" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 mt-5 mt-lg-0">
                    <div class="d-flex mb-5" data-aos="fade-right" data-aos-delay="100">
                        <div class="step-number" style="background-color: var(--primary);">1</div>
                        <div class="step-content">
                            <h4 class="step-title">Create Your Profile</h4>
                            <p class="text-muted">Tell us about your goals, preferences, and limitations so our AI can understand your unique needs and create a personalized wellness plan just for you.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-5" data-aos="fade-right" data-aos-delay="200">
                        <div class="step-number" style="background-color: var(--secondary);">2</div>
                        <div class="step-content">
                            <h4 class="step-title">Get Personalized Plans</h4>
                            <p class="text-muted">Receive AI-generated fitness, nutrition, and mental wellness plans tailored specifically to you, with daily recommendations and guidance.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-5" data-aos="fade-right" data-aos-delay="300">
                        <div class="step-number" style="background-color: var(--accent);">3</div>
                        <div class="step-content">
                            <h4 class="step-title">Track Your Progress</h4>
                            <p class="text-muted">Log your daily activities, meals, and mood to see your improvement over time with beautiful visualizations and insights.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex" data-aos="fade-right" data-aos-delay="400">
                        <div class="step-number" style="background-color: var(--primary);">4</div>
                        <div class="step-content">
                            <h4 class="step-title">Adapt and Improve</h4>
                            <p class="text-muted">Our AI continuously learns from your feedback to refine and improve your wellness recommendations, ensuring you always get the best guidance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- App Screenshots Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Experience LifeSync</h2>
                <p class="section-subtitle mx-auto" style="max-width: 700px;">Take a peek at our intuitive interface designed to make your wellness journey seamless and enjoyable.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1550345332-09e3ac987658?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" class="card-img-top" alt="Fitness Tracking">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">Fitness Tracking</h5>
                            <p class="text-muted">Monitor your workouts and progress</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="Nutrition Planning">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">Nutrition Planning</h5>
                            <p class="text-muted">Personalized meal recommendations</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1160&q=80" class="card-img-top" alt="Mental Wellness">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">Mental Wellness</h5>
                            <p class="text-muted">Track and improve your mental health</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">What Our Users Say</h2>
                <p class="section-subtitle mx-auto" style="max-width: 700px;">Join thousands of satisfied users who have transformed their lives with LifeSync.</p>
            </div>
            
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"LifeSync's AI recommendations have completely transformed my fitness routine. The personalized workouts are challenging yet achievable, and I've seen amazing results!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="rounded-circle me-3" width="60">
                            <div>
                                <p class="testimonial-author mb-0">Sarah Johnson</p>
                                <small class="text-muted">Fitness Enthusiast</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"The nutrition guidance is incredible! As someone with dietary restrictions, finding a meal plan that works has always been a challenge. LifeSync made it effortless."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="rounded-circle me-3" width="60">
                            <div>
                                <p class="testimonial-author mb-0">Michael Chen</p>
                                <small class="text-muted">Health Conscious Professional</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"I've tried many wellness apps, but LifeSync's AI assistant is a game-changer. It's like having a personal coach available 24/7 to answer all my questions."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User" class="rounded-circle me-3" width="60">
                            <div>
                                <p class="testimonial-author mb-0">Emily Rodriguez</p>
                                <small class="text-muted">Busy Mom</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5">
        <div class="container">
            <div class="cta-section text-center" data-aos="fade-up">
                <div class="cta-blob-1"></div>
                <div class="cta-blob-2"></div>
                <h2 class="cta-title">Start Your Wellness Journey Today</h2>
                <p class="cta-subtitle">Join thousands of users who have transformed their lives with LifeSync's AI-powered wellness platform.</p>
                <a href="#" class="btn btn-light btn-lg">Get Started for Free</a>
                <p class="mt-3 mb-0" style="opacity: 0.8;">No credit card required. 14-day free trial.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="footer-title">
                        <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                            <path d="M16 2C8.268 2 2 8.268 2 16C2 23.732 8.268 30 16 30C23.732 30 30 23.732 30 16C30 8.268 23.732 2 16 2Z" fill="#592fde" fill-opacity="0.1"/>
                            <path d="M16 6C10.477 6 6 10.477 6 16C6 21.523 10.477 26 16 26C21.523 26 26 21.523 26 16C26 10.477 21.523 6 16 6Z" fill="#592fde" fill-opacity="0.2"/>
                            <path d="M16 10C12.686 10 10 12.686 10 16C10 19.314 12.686 22 16 22C19.314 22 22 19.314 22 16C22 12.686 19.314 10 16 10Z" fill="#592fde"/>
                            <path d="M16 14C14.895 14 14 14.895 14 16C14 17.105 14.895 18 16 18C17.105 18 18 17.105 18 16C18 14.895 17.105 14 16 14Z" fill="white"/>
                            <path d="M24 9C24 10.1046 23.1046 11 22 11C20.8954 11 20 10.1046 20 9C20 7.89543 20.8954 7 22 7C23.1046 7 24 7.89543 24 9Z" fill="#d959e5"/>
                            <path d="M12 23C12 24.1046 11.1046 25 10 25C8.89543 25 8 24.1046 8 23C8 21.8954 8.89543 21 10 21C11.1046 21 12 21.8954 12 23Z" fill="#d38ded"/>
                        </svg>
                        <span style="font-weight: 700; background: linear-gradient(135deg, #592fde 0%, #d959e5 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">LifeSync</span>
                    </h5>
                    <p class="text-muted">Your AI-powered wellness companion for personalized fitness, nutrition, and mental well-being recommendations.</p>
                    <div class="mt-4">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="footer-title">Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="footer-title">Features</h5>
                    <ul class="footer-links">
                        <li><a href="#">Fitness Plans</a></li>
                        <li><a href="#">Nutrition</a></li>
                        <li><a href="#">Mental Wellness</a></li>
                        <li><a href="#">AI Assistant</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="footer-title">Support</h5>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-title">Download</h5>
                    <ul class="footer-links">
                        <li><a href="#">iOS App</a></li>
                        <li><a href="#">Android App</a></li>
                        <li><a href="#">Desktop App</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="text-center copyright">
                <p>&copy; {{ date('Y') }} LifeSync. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });
            
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if(targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>