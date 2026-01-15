@extends('layouts.app')

@section('title', 'Messages Clients')

@section('header')

    <div class="title_dash">
            <div>
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="100px" height="50px">
            </div>
            <div class="conversation-header-page">
                <a href="{{ url('./') }}" class="back-btn">
                    <i class='bx bx-arrow-back'></i>
                    Retour
                </a>
            </div>
        </div>

@endsection

@section('content')

    <div id="page_structure">
        <div style="background-color: #B45309; flex-basis: 22%; border-right: 1px solid #B45309;">
            <div style="height: 100vh;">
                <x-dashheader/>
            </div>
        </div>

        <div class="section_dash">

            <div class="vendor-messages-page">

                @livewire('vendor-messages-manager')
            </div>

            <style>
            .vendor-messages-page {
                max-width: 1600px;
                margin: 0 auto;
                padding: 30px 20px;
                border: 2px solid #B45309;
                border-radius: 20px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                min-height: calc(100vh - 100px);
            }

            .page-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .page-header h1 {
                font-size: 2.5rem;
                color: #2c3e50;
                margin: 0 0 10px 0;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 15px;
            }

            .page-header h1 i {
                font-size: 3rem;
                background: linear-gradient(135deg, #B45309 0%, #92400E 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .page-header p {
                font-size: 1.1rem;
                color: #898989b3;
                margin: 0;
            }

            .messages-layout {
                display: grid;
                grid-template-columns: 400px 1fr;
                gap: 20px;
                height: calc(100vh - 250px);
                min-height: 470px;
            }

            .conversations-sidebar {
                height: 100%;
                overflow: hidden;
            }

            .chat-main {
                height: 100%;
                overflow: hidden;
            }

            .no-selection {
                background: white;
                border-radius: 12px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                height: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 40px;
                text-align: center;
            }

            .no-selection i {
                font-size: 6rem;
                color: #919799ff;
                margin-bottom: 20px;
            }

            .no-selection h3 {
                font-size: 1.4rem;
                color: #2c3e50;
                margin: 0 0 10px 0;
            }

            .no-selection p {
                font-size: 1.1rem;
                color: #7f8c8d;
                margin: 0;
            }

            @media (max-width: 1200px) {
                .messages-layout {
                    grid-template-columns: 350px 1fr;
                }
            }

            @media (max-width: 992px) {
                .messages-layout {
                    grid-template-columns: 1fr;
                    height: auto;
                }
                
                .conversations-sidebar {
                    height: 400px;
                }
                
                .chat-main {
                    height: 600px;
                }
            }

            @media (max-width: 768px) {
                .page-header h1 {
                    font-size: 2rem;
                    flex-direction: column;
                    gap: 10px;
                }
                
                .vendor-messages-page {
                    padding: 20px 10px;
                }
            }
            </style>

        </div>
    </div>
@endsection
