@component('mail::message')
# Welcome to new Instagram clone

Hi Welcome to new Instagram clone built from Laravel and Vue<br />
Click the below button to get redirected to your home page
@component('mail::button', ['url' => '/'])
Button Text
@endcomponent

Thanks,<br>
Rahul B K

@endcomponent
