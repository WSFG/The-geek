<div class='modal' id='register'>
    <div class='content'>
        <div class="container">
            <h2 class="regiser-header">{{ __('Register') }}</h2>
            <form id="msform" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
                @csrf
                <ul id="progressbar">
                    <li class="active">{{ __('Creating account') }}</li>
                    <li>{{ __('Personal info') }}</li>
                    <li>{{ __('Image') }}</li>
                    <li>{{ __('Social') }}</li>
                </ul>
                <fieldset>
                    <h2 class="fs-title">{{ __('Create your first account') }}</h2>
                    <h3 class="fs-subtitle">{{ __('It`s first step') }}</h3>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input type="email" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input type="password" name="password" placeholder="{{ __('Password') }}" required />
                    <input type="password" name="password_confirmation" placeholder="{{ __('Confirm password') }}" required />
                    <input type="button" name="next" class="next action-button" value="{{ __('Next') }}" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">{{ __('Personal info') }}</h2>
                    <h3 class="fs-subtitle">{{ __('You`r personal data for other user') }}</h3>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required>
                    @if ($errors->has('surname'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="surname" value="{{ old('surname') }}" placeholder="{{ __('Surname') }}" required>
                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="{{ __('Phone number') }}" required >
                    @if ($errors->has('birthday'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                    @endif
                    <input type="date" name="birthday" value="{{ old('birthday') }}" placeholder="{{ __('Birthday') }}" required>
                    @if ($errors->has('country'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('Country') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="country" value="{{ old('country') }}" placeholder="{{ __('Country') }}">
                    @if ($errors->has('city'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('City') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="city" value="{{ old('city') }}" placeholder="{{ __('City') }}">
                    <input type="button" name="previous" class="previous action-button" value="Назад" />
                    <input type="button" name="next" class="next action-button" value="Вперёд" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">{{ __('User photo') }}</h2>
                    <h3 class="fs-subtitle">{{ __('Photo that will be displayed on the page') }}</h3>
                    @if ($errors->has('user_main_photo'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('user_main_photo') }}</strong>
                        </span>
                    @endif
                    <!-- TODO: Preview image -->
                    <input type="file" accept="image/*" name="user_main_photo" value="{{ old('user_main_photo') }}" required >
                    <input type="button" name="previous" class="previous action-button" value="Назад" />
                    <input type="button" name="next" class="next action-button" value="Вперёд" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">{{ __('Social') }}</h2>
                    <h3 class="fs-subtitle">{{ __('Your social account') }}</h3>
                    {{--@include('auth.social')--}}
                    <input type="text" name="skype">
                    <input type="text" name="vk_id">
                    <input type="text" name="instagram_id">
                    <input type="text" name="facebook_id">
                    <input type="text" name="twitter_id">
                    <input type="button" name="previous" class="previous action-button" value="Назад" />
                    <input type="submit" name="submit" class="submit action-button" value="{{ __('Register') }}" />
                </fieldset>
            </form>
        </div>
    </div>
    <a class='btn close-modal' data-modal="#register" href="#">X</a>
</div>