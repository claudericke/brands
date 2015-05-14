<?php

/**
 * file = db.structure.php
  Author = Lebogang Ratsoana
  Date = 13 October 2012

  Descr = Specifies tables to create
  array structure = ("Field", "Description", "Type", "length")

  NB. = Do not add primary keys, they are auto generated
 */
$aTables['br_companydetails'] = array(array("UserID", "User who created the company profile", "int", 11),
    array("CompanyName", "Company name", "varchar", 255),
    array("TradingName", "Name with which the company trades", "varchar", 255),
    array("Industry", "Industry into which the company belongs", "varchar", 255),
    array("ProductsAndServices", "Full description of what the company does", "text", 0),
    array("companylogoid", "Link to company logo", "int", 11),
    array("datecreated", "Date on which user details were stored", "datetime", 0),
    array("dateupdated", "Date on which the company profile was updated", "datetime", 0),
);

$aTables['br_user'] = array(array("Username", "Username", "varchar", 255),
    array("Email", "User's name", "varchar", 255),
    array("Password", "User password", "varchar", 255),
    array("Online", "Whether User/Company is currently logged in", "tinyint", 2),
    array("Activated", "Whether User account has been activated via email or not", "tinyint", 2),
    array("DateCreated", "Date on which user details were stored", "timestamp", 0),
    array("DateUpdated", "Date on which the user profile was updated", "datetime", 0),
    array("lastLogin", "Date on which the user profile was updated", "datetime", 0),
);

$aTables['br_companycontacts'] = array(array("CompanyID", "Link to Company", "int", 11),
    array("Email", "Email Address", "varchar", 255),
    array("CompanyPhone1", "Work Telephone Number", "varchar", 255),
    array("CompanyPhone2", "Work Telephone Number", "varchar", 255),
    array("CompanyPhone3", "Work Telephone Number", "varchar", 255),
    array("PhysicalAddress", "Company Physical Address", "varchar", 255),
    array("PostalAddress", "Company Postal Address", "varchar", 255),
    array("RegistrationNumber", "Brand Number", "varchar", 255),
    array("PreferredLanguage", "Preferred language of correspondence", "varchar", 255),
    array("AccountNumber", "Account Number", "varchar", 255),
    array("PreferredCorrespondence", "Preferred method of correspondence", "enum", "'MobilePhone','eMail','Post'"),
    array("Subscription", "Whether user subscribed to magazine or not", "tinyint", 2),
    array("ThirdpartyMarketing", "Whether user allowed third party marketing or not", "tinyint", 2),
    array("DateCreated", "Date on which company contacts were stored", "timestamp", 0),
    array("DateUpdated", "Date on which the company contacts were updated", "datetime", 0),
);

$aTables['br_messagessentout'] = array(array("userid", "Link to user", "int", 11),
    array("subject", "Email subject", "varchar", 255),
    array("contenttype", "Content type of the email", "varchar", 255),
    array("emailfrom", "Email where mail will be sent from", "varchar", 255),
    array("emailsto", "Email Addresses where mail will be sent to", "varchar", 255),
    array("emailbody", "Body of email to be sent", "text", 0),
    array("datecreated", "Date on which email was created", "datetime", 0),
    array("datesent", "Date on which email was sent", "datetime", 0),
);

$aTables['br_images'] = array(
    array("originalname", "Image's original name", "varchar", 255),
    array("newname", "New image name", "varchar", 255),
    array("path", "Image path", "varchar", 255),
);

$aTables['br_documents'] = array(
    array("originalname", "Document's original name", "varchar", 255),
    array("newname", "New Document name", "varchar", 255),
    array("path", "Document path", "varchar", 255),
);

$aTables['br_errorlog'] = array(
    array("errorcode", "Error code", "varchar", 255),
    array("errormessage", "Description of the error message returned", "text", 0),
    array("fixed", "Whether this error has been fixed or not", "enum", "'No','Yes'"),
);


$aTables['br_productcategories'] = array(
    array("ParentID", "Reference to parent Category", "int", 11),
    array("Category", "Product Category", "varchar", 255),
    array("Description", "Category desription", "text", 0),
    array("DateCreated", "Date on which category details were stored", "timestamp", 0),
    array("DateUpdated", "Date on which category was updated", "datetime", 0),
);

$aTables['br_products'] = array(
    array("CompanyID", "Link to Company", "int", 11),
    array("Category", "Product category", "varchar", 255),
    array("ProductName", "Product Name", "varchar", 255),
    array("Description", "Product description", "text", 0),
    array("Quantity", "Number of products available", "int", 11),
    array("Price", "Price of the product", "int", 11),
    array("ProductImageId", "Link to product Image", "int", 11),
    array("Active", "Whether product should be displayed or not", "tinyint", 2),
    array("DateCreated", "Date on which product details were stored", "timestamp", 0),
    array("DateUpdated", "Date on which the product profile was updated", "datetime", 0),
);

$aTables['br_productoptions'] = array(
    array("CompanyID", "Link to Company", "int", 11),
    array("Name", "Product option", "varchar", 255),
    array("Description", "Link to Product category", "text", 0),
    array("DateCreated", "Date on which products option details were stored", "timestamp", 0),
    array("DateUpdated", "Date on which the products option was updated", "datetime", 0),
);

$aTables['br_productoptionvalues'] = array(
    array("CompanyID", "Link to Company", "int", 11),
    array("ProductID", "Link to Product", "int", 11),
    array("OptionID", "Link to Options", "int", 11),
    array("Active", "Whether product option must be displayed or not", "tinyint", 2),
    array("DateCreated", "Date on which user details were stored", "timestamp", 0),
    array("DateUpdated", "Date on which the user profile was updated", "datetime", 0),
);




$aTables['br_vacancies'] = array(
    array("CompanyID", "Link to Company", "int", 11),
    array("Title", "Vacancy Title", "varchar", 255),
    array("Description", "Details of the requirements and reponsibilities of the vacancy", "text", 0),
    array("DocumentId", "Document attached to vacancy", "int", 11),
    array("Active", "Whether product should be displayed or not", "tinyint", 2),
    array("StartDate", "Date on vacancy will be available", "datetime", 0),
    array("DateCreated", "Date on which user details were stored", "timestamp", 0),
    array("DateUpdated", "Date on which the user profile was updated", "datetime", 0),
);

$aTables['br_promotions'] = array(
    array("CompanyID", "Link to Company", "int", 11),
    array("Title", "Promotion Title", "varchar", 255),
    array("Description", "Details of the promotion", "text", 0),
    array("Active", "Whether promotion should be displayed or not", "tinyint", 2),
    array("StartDate", "Date on which promotion will commence", "datetime", 0),
    array("DateCreated", "Date on which a promotion was stored", "timestamp", 0),
    array("DateUpdated", "Date on which a promotion was updated", "datetime", 0),
);


$aTables['br_services'] = array(
    array("CompanyID", "Link to Company", "int", 11),
    array("Service", "The service offered by the company", "varchar", 255),
    array("Description", "Description of the service offered", "text", 0),
    array("DateCreated", "Date on which user details were stored", "timestamp", 0),
    array("DateUpdated", "Date on which the user profile was updated", "datetime", 0),
);

