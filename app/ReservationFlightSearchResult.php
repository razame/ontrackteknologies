<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class ReservationFlightSearchResult extends Model
{
  protected $connection = 'mongodb';

  protected $fillable = [
    "ResultId", "Origin", "Destination", "IsLcc", "NonRefundable", "AirlineRemark", "Fare", "FareBreakdown",
    "LastTicketDate", "TicketAdvisory", "Segments", "FareRules", "ProviderRemarks", "ValidatingAirline",
    "TripIndicator", "ResponseTime", "JourneyType", "flight_search_id","fare_quote","ssr_request"
  ];
}
