<?php

namespace App\Services;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Collections\ContactsCollection;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Models\ContactModel;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;
use App\Http\Requests\LeadStoreRequest;
use AmoCRM\Models\LeadModel;
use AmoCRM\Client\LongLivedAccessToken;

class LeadService
{
    public function store(LeadStoreRequest $request)
    {
        $apiClient = new AmoCRMApiClient();
        $longLivedAccessToken = new LongLivedAccessToken(config('amocrm.token'));
        $apiClient
            ->setAccessToken($longLivedAccessToken)
            ->setAccountBaseDomain(config('amocrm.api_url'));

        $data = $request->validated();

        $contacts = new ContactsCollection();
        $contact = new ContactModel();
        $contact->setId(12323123);
        $contact->name = $data['name'];

        $contactCustomFieldsValues  = new CustomFieldsValuesCollection();
        $emailCustomField = new TextCustomFieldValuesModel();
        $phoneCustomField = new TextCustomFieldValuesModel();
        $phoneCustomField->setFieldId(790371);
        $emailCustomField->setFieldId(790375);
        $phoneCustomField->setFieldName('phone');
        $emailCustomField->setFieldName('email');
        $phoneCustomField->setValues(
            (new TextCustomFieldValueCollection())
                ->add((new TextCustomFieldValueModel())->setValue($data['phone']))
        );
        $emailCustomField->setValues(
            (new TextCustomFieldValueCollection())
                ->add((new TextCustomFieldValueModel())->setValue($data['email']))
        );
        $contactCustomFieldsValues->add($emailCustomField);
        $contactCustomFieldsValues->add($phoneCustomField);
        $contact->setCustomFieldsValues($contactCustomFieldsValues);

        $contacts->add($contact);

        $lead = new LeadModel();
        $lead->price = $data['price'];
        $lead->setContacts($contacts);

        $leadCustomFieldsValues = new CustomFieldsValuesCollection();
        $spentThirtySecCustomField = new TextCustomFieldValuesModel();
        $spentThirtySecCustomField->setFieldId(790399);
        $spentThirtySecCustomField->setFieldName('spent_30_sec');
        $spentThirtySecCustomField->setValues(
            (new TextCustomFieldValueCollection())
                ->add((new TextCustomFieldValueModel())->setValue($data['spent_30_sec']))
        );
        $leadCustomFieldsValues->add($spentThirtySecCustomField);
        $lead->setCustomFieldsValues($leadCustomFieldsValues);

        $leadsService = $apiClient->leads();
        $leadsService->addOneComplex($lead);

        return $lead;
    }
}
