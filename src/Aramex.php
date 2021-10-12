<?php

namespace OmarEhab\Aramex;

use OmarEhab\Aramex\API\Requests\Location\FetchCities;
use OmarEhab\Aramex\API\Requests\Location\FetchCountries;
use OmarEhab\Aramex\API\Requests\Location\FetchCountry;
use OmarEhab\Aramex\API\Requests\Location\FetchDropOffLocations;
use OmarEhab\Aramex\API\Requests\Location\FetchOffices;
use OmarEhab\Aramex\API\Requests\Location\FetchStates;
use OmarEhab\Aramex\API\Requests\Location\ValidateAddress;
use OmarEhab\Aramex\API\Requests\Rate\CalculateRate;
use OmarEhab\Aramex\API\Requests\Shipping\CancelPickup;
use OmarEhab\Aramex\API\Requests\Shipping\CreatePickup;
use OmarEhab\Aramex\API\Requests\Shipping\CreateShipments;
use OmarEhab\Aramex\API\Requests\Shipping\GetLastShipmentsNumbersRange;
use OmarEhab\Aramex\API\Requests\Shipping\PrintLabel;
use OmarEhab\Aramex\API\Requests\Shipping\ReserveShipmentNumberRange;
use OmarEhab\Aramex\API\Requests\Shipping\ScheduleDelivery;
use OmarEhab\Aramex\API\Requests\Tracking\TrackPickup;
use OmarEhab\Aramex\API\Requests\Tracking\TrackShipments;

class Aramex
{
    // Location
    public static function fetchCities(): FetchCities
    {
        return new FetchCities();
    }

    public static function fetchCountries(): FetchCountries
    {
        return new FetchCountries();
    }

    public static function fetchCountry(): FetchCountry
    {
        return new FetchCountry();
    }

    public static function fetchDropOffLocations(): FetchDropOffLocations
    {
        return new FetchDropOffLocations();
    }

    public static function fetchOffices(): FetchOffices
    {
        return new FetchOffices();
    }

    public static function fetchStates(): FetchStates
    {
        return new FetchStates();
    }

    public static function validateAddress(): ValidateAddress
    {
        return new ValidateAddress();
    }

    // Rate
    public static function calculateRate(): CalculateRate
    {
        return new CalculateRate();
    }

    // Shipping
    public static function cancelPickup(): CancelPickup
    {
        return new CancelPickup();
    }

    public static function createPickup(): CreatePickup
    {
        return new CreatePickup();
    }

    public static function createShipments(): CreateShipments
    {
        return new CreateShipments();
    }

    public static function getLastShipmentsNumbersRange(): GetLastShipmentsNumbersRange
    {
        return new GetLastShipmentsNumbersRange();
    }

    public static function printLabel(): PrintLabel
    {
        return new PrintLabel();
    }

    public static function reserveShipmentNumberRange(): ReserveShipmentNumberRange
    {
        return new ReserveShipmentNumberRange();
    }

    public static function scheduleDelivery(): ScheduleDelivery
    {
        return new ScheduleDelivery();
    }

    // Tracking
    public static function trackPickup(): TrackPickup
    {
        return new TrackPickup();
    }

    public static function trackShipments(): TrackShipments
    {
        return new TrackShipments();
    }
}