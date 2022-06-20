<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://scontent.fccp1-1.fna.fbcdn.net/v/t1.6435-9/183881776_112051974375531_202167592988748542_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeGzd5nWf4H9yuif4rvRNZO64Z9Mf2YT5Tfhn0x_ZhPlNz6ZWcEILFQ1UzqyTZuUXK0&_nc_ohc=LRXEhDPtpgEAX8Ge8Hz&tn=rHDKTQpv3nKnp3Vm&_nc_ht=scontent.fccp1-1.fna&oh=00_AT-rhkHs0yNOb4cSIqj6WbzyeI0Apo8WrkzUijhOk7wBjQ&oe=62B2D458" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
