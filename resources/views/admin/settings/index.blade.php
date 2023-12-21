@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Car</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cars</a></li>
                            <li class="breadcrumb-item active">Add Car</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="col-12 col-sm-6">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                               href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                               aria-selected="false">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                               href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                               aria-selected="false">S-M</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                               href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                               aria-selected="true"> Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                               href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings"
                               aria-selected="false">Email Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                             aria-labelledby="custom-tabs-four-home-tab">
                            <!-- Home Tab Form -->
                            <form action="{{ route('admin.setting.update', ['id' => $setting->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <textarea id="keywords" name="keywords"
                                              class="form-control">{{ old('keywords', $setting->keywords) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description"
                                              class="form-control">{{ old('description', $setting->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" id="company_name" name="company_name" class="form-control"
                                           value="{{ old('company_name', $setting->company_name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Contact Email</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                           value="{{ old('email', $setting->email) }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Contact Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                           value="{{ old('phone', $setting->phone) }}">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" id="logo" name="logo" class="form-control"
                                           value="{{ old('logo', $setting->logo) }}">
                                </div>
                                <div class="form-group">
                                    <label for="facebook_url">Facebook URL</label>
                                    <input type="text" id="facebook_url" name="facebook_url" class="form-control"
                                           value="{{ old('facebook_url', $setting->facebook_url) }}">
                                </div>
                                <div class="form-group">
                                    <label for="twitter_url">Twitter URL</label>
                                    <input type="text" id="twitter_url" name="twitter_url" class="form-control"
                                           value="{{ old('twitter_url', $setting->twitter_url) }}">
                                </div>
                                <div class="form-group">
                                    <label for="instagram_url">Instagram URL</label>
                                    <input type="text" id="instagram_url" name="instagram_url" class="form-control"
                                           value="{{ old('instagram_url', $setting->instagram_url) }}">
                                </div>
                                <div class="form-group">
                                    <label for="linkedin_url">LinkedIn URL</label>
                                    <input type="text" id="linkedin_url" name="linkedin_url" class="form-control"
                                           value="{{ old('linkedin_url', $setting->linkedin_url) }}">
                                </div>
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <input type="text" id="currency" name="currency" class="form-control"
                                           value="{{ old('currency', $setting->currency) }}">
                                </div>
                                <div class="form-group">
                                    <label for="about_us">About Us</label>
                                    <textarea id="about_us" name="about_us" class="form-control">"{{ old('about_us', $setting->about_us) }}"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="contact_info">Contact Information</label>
                                    <textarea id="contact_info" name="contact_info" class="form-control">"{{ old('contact_info', $setting->contact_info) }}"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                        <option value="maintenance">Under Maintenance</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="smtp_server">SMTP Server</label>
                                    <input type="text" id="smtp_server" name="smtp_server" class="form-control"
                                           value="{{ old('smtp_server', $setting->smtp_server) }}">
                                </div>
                                <div class="form-group">
                                    <label for="smtp_username">SMTP Username</label>
                                    <input type="text" id="smtp_username" name="smtp_username" class="form-control"
                                           value="{{ old('smtp_username', $setting->smtp_username) }}">
                                </div>
                                <div class="form-group">
                                    <label for="smtp_password">SMTP Password</label>
                                    <input type="password" id="smtp_password" name="smtp_password" class="form-control"
                                           value="{{ old('smtp_password', $setting->smtp_password) }}">
                                </div>
                                <div class="form-group">
                                    <label for="smtp_port">SMTP Port</label>
                                    <input type="text" id="smtp_port" name="smtp_port" class="form-control"
                                           value="{{ old('smtp_port', $setting->smtp_port) }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Email Settings Tab</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
