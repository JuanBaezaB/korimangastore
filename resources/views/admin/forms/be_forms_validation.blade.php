@extends('layouts.backend')

@section('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Form Validation</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active" aria-current="page">Validation</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="be_forms_validation.php" method="POST">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Validation Form</h3>
                    <div class="block-options">
                        <button type="submit" class="btn btn-sm btn-alt-secondary">
                            <i class="fa fa-fw fa-check"></i> Submit
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="">
                        <!-- Regular -->
                        <h2 class="content-heading">Regular</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Username, email and password validation made easy for your login/register forms
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="val-username">Username <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-username" name="val-username"
                                        placeholder="Enter a username..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-email">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="val-email" name="val-email"
                                        placeholder="Your valid email..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-password">Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="val-password" name="val-password"
                                        placeholder="Choose a safe one..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-confirm-password">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="val-confirm-password"
                                        name="val-confirm-password" placeholder="..and confirm it!">
                                </div>
                            </div>
                        </div>
                        <!-- END Regular -->

                        <!-- Advanced -->
                        <h2 class="content-heading">Advanced</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    You can easily validate any kind of data you like either it is in a normal input, a
                                    textarea or a select box
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="val-suggestions">Suggestions <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5"
                                        placeholder="What would you like to see?"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-skill">Best Skill <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="val-skill" name="val-skill">
                                        <option value="">Please select</option>
                                        <option value="html">HTML</option>
                                        <option value="css">CSS</option>
                                        <option value="javascript">JavaScript</option>
                                        <option value="angular">Angular</option>
                                        <option value="react">React</option>
                                        <option value="vuejs">Vue.js</option>
                                        <option value="ruby">Ruby</option>
                                        <option value="php">PHP</option>
                                        <option value="asp">ASP.NET</option>
                                        <option value="python">Python</option>
                                        <option value="mysql">MySQL</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-currency">Currency <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-currency" name="val-currency"
                                        placeholder="$21.60">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-website">Website <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-website" name="val-website"
                                        placeholder="http://example.com">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-phoneus">Phone (US) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-phoneus" name="val-phoneus"
                                        placeholder="212-999-0000">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-digits">Digits <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-digits" name="val-digits"
                                        placeholder="5">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-number">Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-number" name="val-number"
                                        placeholder="5.0">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-range">Range [1, 5] <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-range" name="val-range"
                                        placeholder="4">
                                </div>
                                <div class="mb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">Terms &amp;
                                        Conditions</a> <span class="text-danger">*</span>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="val-terms" name="val-terms"
                                            value="1">
                                        <label class="form-check-label" for="val-terms">I agree</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Advanced -->

                        <!-- Third Party Plugins -->
                        <h2 class="content-heading">Third Party Plugins</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Check out how easy it is to enable the validation on third party plugins such as Select2
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="val-select2">Select2 <span
                                            class="text-danger">*</span></label>
                                    <select class="js-basic-single js-select2 form-select" id="val-select2" name="val-select2"
                                        style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="html">HTML</option>
                                        <option value="css">CSS</option>
                                        <option value="javascript">JavaScript</option>
                                        <option value="angular">Angular</option>
                                        <option value="react">React</option>
                                        <option value="vuejs">Vue.js</option>
                                        <option value="ruby">Ruby</option>
                                        <option value="php">PHP</option>
                                        <option value="asp">ASP.NET</option>
                                        <option value="python">Python</option>
                                        <option value="mysql">MySQL</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-select2-multiple">Select2 Multiple <span
                                            class="text-danger">*</span></label>
                                    <select class="js-basic-multiple js-select2 form-select" id="val-select2-multiple"
                                        name="val-select2-multiple[]" style="width: 100%;"
                                        data-placeholder="Choose at least two.." multiple="multiple">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="html">HTML</option>
                                        <option value="css">CSS</option>
                                        <option value="javascript">JavaScript</option>
                                        <option value="angular">Angular</option>
                                        <option value="react">React</option>
                                        <option value="vuejs">Vue.js</option>
                                        <option value="ruby">Ruby</option>
                                        <option value="php">PHP</option>
                                        <option value="asp">ASP.NET</option>
                                        <option value="python">Python</option>
                                        <option value="mysql">MySQL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- END Third Party Plugins -->

                        <!-- Submit -->
                        <div class="row items-push">
                            <div class="col-lg-7 offset-lg-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- END Submit -->
                    </div>
                </div>
            </div>
        </form>
        <!-- jQuery Validation -->

        <!-- Terms Modal -->
        <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Terms &amp; Conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            hola
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Terms Modal -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/select2/js/select2.full.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

    <!-- select2-->
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.js-basic-multiple').select2({});
                $('.js-basic-single').select2();
            });
        });
    </script>

    <!-- validations -->
    <script>
        jQuery('.js-validation').validate({
            ignore: [],
            rules: {
                'val-username': {
                    required: true,
                    minlength: 3
                },
                'val-email': {
                    required: true,
                    email: true
                },
                'val-password': {
                    required: true,
                    minlength: 5
                },
                'val-confirm-password': {
                    required: true,
                    equalTo: '#val-password'
                },
                'val-suggestions': {
                    required: true,
                    minlength: 5
                },
                'val-skill': {
                    required: true
                },
                'val-currency': {
                    required: true,
                    currency: ['$', true]
                },
                'val-website': {
                    required: true,
                    url: true
                },
                'val-phoneus': {
                    required: true,
                    phoneUS: true
                },
                'val-digits': {
                    required: true,
                    digits: true
                },
                'val-number': {
                    required: true,
                    number: true
                },
                'val-range': {
                    required: true,
                    range: [1, 5]
                },
                'val-terms': {
                    required: true
                },
                'val-select2': {
                    required: true
                },
                'val-select2-multiple': {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                'val-username': {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'val-email': 'Please enter a valid email address',
                'val-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                },
                'val-confirm-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'val-select2': 'Please select a value!',
                'val-select2-multiple': 'Please select at least 2 values!',
                'val-suggestions': 'What can we do to become better?',
                'val-skill': 'Please select a skill!',
                'val-currency': 'Please enter a price!',
                'val-website': 'Please enter your website!',
                'val-phoneus': 'Please enter a US phone!',
                'val-digits': 'Please enter only digits!',
                'val-number': 'Please enter a number!',
                'val-range': 'Please enter a number between 1 and 5!',
                'val-terms': 'You must agree to the service terms!'
            }
        });

        // Init Validation on Select2 change
        jQuery('.js-select2').on('change', e => {
            jQuery(e.currentTarget).valid();
        });
    </script>
@endsection
