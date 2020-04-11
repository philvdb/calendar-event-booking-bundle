<?php

/**
 * Calendar Event Booking Bundle Extension for Contao CMS
 * Copyright (c) 2008-2020 Marko Cupic
 * @package Markocupic\CalendarEventBookingBundle
 * @author Marko Cupic m.cupic@gmx.ch, 2020
 * @link https://github.com/markocupic/calendar-event-booking-bundle
 */

// Add child table tl_calendar_events_member to tl_calendar_events
$GLOBALS['BE_MOD']['content']['calendar']['tables'][] = 'tl_calendar_events_member';

if (TL_MODE === 'BE')
{
    // Add Backend CSS
    $GLOBALS['TL_CSS'][] = 'bundles/markocupiccalendareventbooking/css/be_stylesheet.css';
}

// Form HOOKS (event booking)
// Hooks will be registered in ModuleEventBooking::generate()
// Override these globals if you want to use custom form validation
$GLOBALS['CALENDAR_EVENT_BOOKING_BUNDLE']['HOOKS']['postUpload'] = ['Markocupic\CalendarEventBookingBundle\ValidateForms', 'postUpload'];
$GLOBALS['CALENDAR_EVENT_BOOKING_BUNDLE']['HOOKS']['compileFormFields'] = ['Markocupic\CalendarEventBookingBundle\ValidateForms', 'compileFormFields'];
$GLOBALS['CALENDAR_EVENT_BOOKING_BUNDLE']['HOOKS']['loadFormField'] = ['Markocupic\CalendarEventBookingBundle\ValidateForms', 'loadFormField'];
$GLOBALS['CALENDAR_EVENT_BOOKING_BUNDLE']['HOOKS']['validateFormField'] = ['Markocupic\CalendarEventBookingBundle\ValidateForms', 'validateFormField'];
$GLOBALS['CALENDAR_EVENT_BOOKING_BUNDLE']['HOOKS']['storeFormData'] = ['Markocupic\CalendarEventBookingBundle\ValidateForms', 'storeFormData'];
$GLOBALS['CALENDAR_EVENT_BOOKING_BUNDLE']['HOOKS']['prepareFormData'] = ['Markocupic\CalendarEventBookingBundle\ValidateForms', 'prepareFormData'];

// Send notification
$GLOBALS['CALENDAR_EVENT_BOOKING_BUNDLE']['HOOKS']['processFormData'] = ['Markocupic\CalendarEventBookingBundle\ValidateForms', 'processFormData'];


// Notification center
$GLOBALS['NOTIFICATION_CENTER']['NOTIFICATION_TYPE']['calendar-event-booking-bundle'] = [
    // Type
    'booking-notification'           => [
        // Field in tl_nc_language
        'email_sender_name'    => ['organizer_senderName'],
        'email_sender_address' => ['organizer_senderEmail'],
        'recipients'           => ['organizer_senderEmail', 'member_email'],
        'email_recipient_cc'   => ['organizer_senderEmail', 'member_email'],
        'email_recipient_bcc'  => ['organizer_senderEmail', 'member_email'],
        'email_replyTo'        => ['organizer_senderEmail'],
        'email_subject'        => ['event_*', 'event_unsubscribeHref', 'member_*', 'member_dateOfBirthFormated', 'member_salutation', 'organizer_*', 'organizer_senderName', 'organizer_senderEmail'],
        'email_text'           => ['event_*', 'event_unsubscribeHref', 'member_*', 'member_dateOfBirthFormated', 'member_salutation', 'organizer_*', 'organizer_senderName', 'organizer_senderEmail'],
        'email_html'           => ['event_*', 'event_unsubscribeHref', 'member_*', 'member_dateOfBirthFormated', 'member_salutation', 'organizer_*', 'organizer_senderName', 'organizer_senderEmail'],
    ],
    // Type
    'event-unsubscribe-notification' => [
        // Field in tl_nc_language
        'email_sender_name'    => ['organizer_senderName'],
        'email_sender_address' => ['organizer_senderEmail'],
        'recipients'           => ['organizer_senderEmail', 'member_email'],
        'email_recipient_cc'   => ['organizer_senderEmail', 'member_email'],
        'email_recipient_bcc'  => ['organizer_senderEmail', 'member_email'],
        'email_replyTo'        => ['organizer_senderEmail'],
        'email_subject'        => ['event_*', 'event_unsubscribeHref', 'member_*', 'member_dateOfBirthFormated', 'member_salutation', 'organizer_*', 'organizer_senderName', 'organizer_senderEmail'],
        'email_text'           => ['event_*', 'event_unsubscribeHref', 'member_*', 'member_dateOfBirthFormated', 'member_salutation', 'organizer_*', 'organizer_senderName', 'organizer_senderEmail'],
        'email_html'           => ['event_*', 'event_unsubscribeHref', 'member_*', 'member_dateOfBirthFormated', 'member_salutation', 'organizer_*', 'organizer_senderName', 'organizer_senderEmail'],
    ],
];
