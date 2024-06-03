
<style>
  @page {
    size: 13cm 35cm landscape;
  }
  

  .container{
    padding: 5px; 
    font-family: Arial, Helvetica, sans-serif; 
    page-break-before: always;  
    display: block;
  }

  .name{
      font-size:4rem;
      font-weight:bold;
    }

    .time{
      justify-content:start;
      align-items:center;
      display:flex;
      font-weight:600;
      padding:5px;
    }

    .ticket{
        color: rgb(23, 142, 182);
    }

    .dur{
      justify-content:start;
      align-items:center;
      display:flex;
      font-weight:600;
      margin-top:10px;
      padding:5px;
    }

    .loc{
      justify-content:start;
      align-items:center;
      display:flex;
      font-weight:600;
      margin-top:10px;
      padding:5px;
    }
</style>
@foreach ($transaction->transactionDetails as $detail)
  <div class="container">
    <div style="float: left">
      <h1 class="name">{{ $event->name }}</h1>
      <h2><span class="ticket">{{ $detail->ticket->name }}</span> tickets</h2>
      <div class="time">  {{ $event->start_time->format('l, d F Y, H:i') }}</div>
      <div class="dur"> {{ $event->durations }} hour(s)</div>
      <div class="loc"> {{ $event->locations }}</div>
      <div style="margin-top: 20px; font-size: 28px; font-family: monospace">
        <span style="font-family: Arial, Helvetica, sans-serif; font-size:1.5rem;">Ticket ID:</span>
        {{ $detail->code }}
    </div>
    </div>
@endforeach
</div>