<?php

/**
 * Update "Contact Us" form to have a reply message.
 */
function mymodule_post_update_change_contactus_reply() {
  $contact_form = \Drupal\contact\Entity\ContactForm::load('contactus');
  $contact_form->setReply(t('Thank you for contacting us, we will reply shortly'));
  $contact_form->save();
}
