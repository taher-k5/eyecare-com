<?php
/**
 * Retour Configuration
 *
 * Completely optional configuration settings for Retour if you want to
 * customize some of its more esoteric behavior, or just want specific control
 * over things.
 *
 */

return array(

    /**
     * Controls whether Retour automatically creates static redirects when an entry's URI changes.
     */
    "createUriChangeRedirects" => true,

    /**
     * How many stats should be stored
     */
    "statsStoredLimit" => 1000,

    /**
     * How many stats to display in the Admin CP
     */
    "statsDisplayLimit" => 1000,

    /**
     * How many static redirects to display in the Admin CP
     */
    "staticRedirectDisplayLimit"  => 500,

    /**
     * How many dynamic redirects to display in the Admin CP
     */
    "dynamicRedirectDisplayLimit" => 100,

    /**
     * Should the query string be stripped from the saved statistics source URLs?
     */
    "stripQueryStringFromStats"   => true,

    /**
     * Should the query string be stripped from all 404 URLs before their evaluation?
     */
    "alwaysStripQueryString"   => false,

);