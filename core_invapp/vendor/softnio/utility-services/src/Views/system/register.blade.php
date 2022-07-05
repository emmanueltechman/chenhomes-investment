@php $env = 'envato'; @endphp

<h5 class="mb-3">{!! 'Activate the Application' !!}</h5>
<p>{!! 'Before you proceed, please make sure you have valid purchase information to activate the application. Contact our <strong><a href="'. the_link('softnio.com/contact/') .'" target="_blank">support team</a></strong>, if you need help.' !!}</p>

@if(isset($notice) && $notice) 
<p class="alert alert-warning px-2 py-1 mb-3">
    {{ 'The purchase information is not valid or it may used in another domain or path.' }}
</p>
@endif

<form class="form-validate is-alter" action="{{ route('app.service.update') }}" method="POST">
    <div class="form-group">
        <label class="form-label">{!! ucfirst($env).' Purchase Code' !!}</label>
        <div class="form-control-wrap">
            <input type="text" name="purchase_code" class="form-control"{!! (sys_info('pcode')) ? ' value="'.sys_info('pcode').'"' : '' !!} 
                    placeholder="{!! '10101010-10ab-0102-02cb-a1b1c101a201' !!}" 
                    data-msg-required="Required" data-msg-minlength="Minimum 32 characters" 
                    data-msg-maxlength="Minimum 40 characters" minlength="32" maxlength="40" required>
        </div>
        <div class="form-note">{!! 'Please enter your valid purchased code.'.' <a href="'.the_link('help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-').'" target="_blank">Find the Code?</a>' !!}</div>
    </div>
    <div class="form-group">
        <label class="form-label" >{!! ucfirst($env).' Username' !!}</label>
        <div class="form-control-wrap">
            <input type="text" name="name" class="form-control"{!! (sys_info('euser')) ? ' value="'.sys_info('euser').'"' : '' !!} placeholder="{!! 'Enter your ' .$env. ' username' !!}" required data-msg-required="Required">
        </div>
        <div class="form-note">{!! 'Please enter your '. ucfirst($env) .' username that used to purchase the application.' !!}</div>
    </div>
    <div class="form-group">
        <label class="form-label">{!! 'Email Address' !!}</label>
        <div class="form-control-wrap">
            <input type="email" name="email" class="form-control"{!! (sys_info('email')) ? ' value="'.sys_info('email').'"' : '' !!} placeholder="{!! 'Enter your email address' !!}" required data-msg-required="Required">
        </div>
        <div class="form-note">{!! 'Please enter a valid email as it will require for reset activation or support.' !!}</div>
    </div>
    <div class="form-group">
        @csrf
        <input type="submit" class="btn btn-primary btn-mw btn-submit" value="{!! 'Submit' !!}">
    </div>
    <div class="form-note">
        {!! 'By clicking the submit button, you agree with the <a href="'.the_link('codecanyon.net/licenses/standard').'" target="_blank">'.ucfirst($env).' Standard License</a> terms along with Softnio terms and conditions.' !!}
    </div>
</form>
