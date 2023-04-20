<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Installer Middleware


    // Website routes
    Route::get('/', [App\Http\Controllers\Website\WebController::class, "webIndex"])->name("web.index");
    Route::get('/tools', [App\Http\Controllers\Website\WebController::class, "webTools"])->name("web.tools");
    Route::get('/features', [App\Http\Controllers\Website\WebController::class, "webFeatures"])->name("web.features");
    Route::get('/about', [App\Http\Controllers\Website\WebController::class, "webAbout"])->name("web.about");
    Route::get('/pricing', [App\Http\Controllers\Website\WebController::class, "webPricing"])->name("web.pricing");
    Route::get('/contact', [App\Http\Controllers\Website\WebController::class, "webContact"])->name("web.contact");
    Route::post("/send-email", [App\Http\Controllers\Website\MailerController::class, "composeEmail"])->name("send-email");
    Route::get('/faq', [App\Http\Controllers\Website\WebController::class, "webFAQ"])->name("web.faq");
    Route::get('/privacy-policy', [App\Http\Controllers\Website\WebController::class, "webPrivacy"])->name("web.privacy");
    Route::get('/refund-policy', [App\Http\Controllers\Website\WebController::class, "webRefund"])->name("web.refund");
    Route::get('/terms-and-conditions', [App\Http\Controllers\Website\WebController::class, "webTerms"])->name("web.terms");

    // Custom pages
    Route::get('/p/{id}', [App\Http\Controllers\Website\WebController::class, "customPage"])->name("web.custom.page");

    // Auth routes
    Auth::routes();

    // Admin routes
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
        // Dashboard
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, "index"])->name('dashboard');

        // Users
        Route::get('users', [App\Http\Controllers\Admin\UserController::class, "index"])->name('users');
        Route::get('edit-user/{id}', [App\Http\Controllers\Admin\UserController::class, "editUser"])->name('edit.user');
        Route::post('update-user', [App\Http\Controllers\Admin\UserController::class, "updateUser"])->name('update.user');
        Route::get('view-user/{id}', [App\Http\Controllers\Admin\UserController::class, "viewUser"])->name('view.user');
        Route::get('change-user-plan/{id}', [App\Http\Controllers\Admin\UserController::class, "ChangeUserPlan"])->name('change.user.plan');
        Route::post('update-user-plan', [App\Http\Controllers\Admin\UserController::class, "UpdateUserPlan"])->name('update.user.plan');
        Route::get('update-status', [App\Http\Controllers\Admin\UserController::class, "updateStatus"])->name('update.status');
        Route::get('delete-user', [App\Http\Controllers\Admin\UserController::class, "deleteUser"])->name('delete.user');
        Route::get('login-as/{id}', [App\Http\Controllers\Admin\UserController::class, "authAs"])->name('login-as.user');

        // Plans
        Route::get('plans', [App\Http\Controllers\Admin\PlanController::class, "index"])->name('index.plans');
        Route::get('add-plan', [App\Http\Controllers\Admin\PlanController::class, "addPlan"])->name('add.plan');
        Route::post('save-plan', [App\Http\Controllers\Admin\PlanController::class, "savePlan"])->name('save.plan');
        Route::get('edit-plan/{id}', [App\Http\Controllers\Admin\PlanController::class, "editPlan"])->name('edit.plan');
        Route::post('update-plan', [App\Http\Controllers\Admin\PlanController::class, "updatePlan"])->name('update.plan');
        Route::get('delete-plan', [App\Http\Controllers\Admin\PlanController::class, "deletePlan"])->name('delete.plan');

        // Payment Gateways
        Route::get('payment-methods', [App\Http\Controllers\Admin\PaymentMethodController::class, "index"])->name('payment.methods');
        Route::get('add-payment-method', [App\Http\Controllers\Admin\PaymentMethodController::class, "addPaymentMethod"])->name('add.payment.method');
        Route::post('save-payment-method', [App\Http\Controllers\Admin\PaymentMethodController::class, "savePaymentMethod"])->name('save.payment.method');
        Route::get('edit-payment-method/{id}', [App\Http\Controllers\Admin\PaymentMethodController::class, "editPaymentMethod"])->name('edit.payment.method');
        Route::post('update-payment-method', [App\Http\Controllers\Admin\PaymentMethodController::class, "updatePaymentMethod"])->name('update.payment.method');
        Route::get('delete-payment-method', [App\Http\Controllers\Admin\PaymentMethodController::class, "deletePaymentMethod"])->name('delete.payment.method');

        // Transactions
        Route::get('transactions', [App\Http\Controllers\Admin\TransactionController::class, "index"])->name('transactions');
        Route::get('transaction-status/{id}/{status}', [App\Http\Controllers\Admin\TransactionController::class, "transactionStatus"])->name('trans.status');
        Route::get('offline-transactions', [App\Http\Controllers\Admin\TransactionController::class, "offlineTransactions"])->name('offline.transactions');
        Route::get('offline-transaction-status/{id}/{status}', [App\Http\Controllers\Admin\TransactionController::class, "offlineTransactionStatus"])->name('offline.trans.status');
        Route::get('view-invoice/{id}', [App\Http\Controllers\Admin\TransactionController::class, "viewInvoice"])->name('view.invoice');

        // Account Setting
        Route::get('account', [App\Http\Controllers\Admin\AccountController::class, "index"])->name('index.account');
        Route::get('edit-account', [App\Http\Controllers\Admin\AccountController::class, "editAccount"])->name('edit.account');
        Route::post('update-account', [App\Http\Controllers\Admin\AccountController::class, "updateAccount"])->name('update.account');
        Route::get('change-password', [App\Http\Controllers\Admin\AccountController::class, "changePassword"])->name('change.password');
        Route::post('update-password', [App\Http\Controllers\Admin\AccountController::class, "UpdatePassword"])->name('update.password');

        // Change theme
        Route::get('theme/{id}', [App\Http\Controllers\Admin\AccountController::class, "changeTheme"])->name('change.theme');

        // Pages
        Route::get('pages', [App\Http\Controllers\Admin\PageController::class, "index"])->name('pages');
        Route::get('add-page', [App\Http\Controllers\Admin\PageController::class, "addPage"])->name('add.page');
        Route::post('save-page', [App\Http\Controllers\Admin\PageController::class, "savePage"])->name('save.page');
        Route::get('custom-page/{id}', [App\Http\Controllers\Admin\PageController::class, "editCustomPage"])->name('edit.custom.page');
        Route::post('custom-update-page', [App\Http\Controllers\Admin\PageController::class, "updateCustomPage"])->name('update.custom.page');
        Route::get('status-page', [App\Http\Controllers\Admin\PageController::class, "statusPage"])->name('status.page');
        Route::get('page/{id}', [App\Http\Controllers\Admin\PageController::class, "editPage"])->name('edit.page');
        Route::post('update-page/{id}', [App\Http\Controllers\Admin\PageController::class, "updatePage"])->name('update.page');
        Route::get('disable-page', [App\Http\Controllers\Admin\PageController::class, "disablePage"])->name('disable.page');
        Route::get('delete-page', [App\Http\Controllers\Admin\PageController::class, "deletePage"])->name('delete.page');

        // Setting
        Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, "index"])->name('settings');
        Route::post('change-general-settings', [App\Http\Controllers\Admin\SettingController::class, "changeGeneralSettings"])->name('change.general.settings');
        Route::post('change-aws-s3-settings', [App\Http\Controllers\Admin\SettingController::class, "changeS3Settings"])->name('change.aws.s3.settings');
        Route::post('change-ai-settings', [App\Http\Controllers\Admin\SettingController::class, "changeAISettings"])->name('change.ai.settings');
        Route::post('change-website-settings', [App\Http\Controllers\Admin\SettingController::class, "changeWebsiteSettings"])->name('change.website.settings');
        Route::post('change-payments-settings', [App\Http\Controllers\Admin\SettingController::class, "changePaymentsSettings"])->name('change.payments.settings');
        Route::post('change-google-settings', [App\Http\Controllers\Admin\SettingController::class, "changeGoogleSettings"])->name('change.google.settings');
        Route::post('change-email-settings', [App\Http\Controllers\Admin\SettingController::class, "changeEmailSettings"])->name('change.email.settings');

        Route::get('tax-setting', [App\Http\Controllers\Admin\SettingController::class, "taxSetting"])->name('tax.setting');
        Route::post('update-tex-setting', [App\Http\Controllers\Admin\SettingController::class, "updateTaxSetting"])->name('update.tax.setting');
        Route::post('update-email-setting', [App\Http\Controllers\Admin\SettingController::class, "updateEmailSetting"])->name('update.email.setting');
        Route::get('test-email', [App\Http\Controllers\Admin\SettingController::class, "testEmail"])->name('test.email');

        // License
        Route::get('license', [App\Http\Controllers\Admin\LicenseController::class, "license"])->name('license');
        Route::post('verify-license', [App\Http\Controllers\Admin\LicenseController::class, "verifyLicense"])->name('verify.license');

        // Log Authentication
        Route::get('logs', [App\Http\Controllers\Admin\AuthenticationLogController::class, "index"])->name('logs');

        // Clear cache
        Route::get('clear', [App\Http\Controllers\Admin\SettingController::class, "clear"])->name('clear');
        // Check update
        Route::get('check', [App\Http\Controllers\Admin\UpdateController::class, 'check'])->name('check');
        Route::post('check-update', [App\Http\Controllers\Admin\UpdateController::class, 'checkUpdate'])->name('check.update');
        Route::post('update-code', [App\Http\Controllers\Admin\UpdateController::class, 'updateCode'])->name('update.code');
    });

    // User routes
    Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
        // Dashboard
        Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, "index"])->name('dashboard');

        // Plans
        Route::get('plans', [App\Http\Controllers\User\PlanController::class, "index"])->name('plans');

        // Create AI Content 
        Route::get('ai/gc', [App\Http\Controllers\User\AIContentCreatorController::class, "indexAllAiContent"])->name('all.ai.content');
        Route::get('ai/gc/new', [App\Http\Controllers\User\AIContentCreatorController::class, "indexNewAiContent"])->name('new.ai.content');
        Route::get('ai/gc/blog-outline', [App\Http\Controllers\User\AIContentCreatorController::class, "aiBlogOutline"])->name('ai.blog.outline');
        Route::get('ai/gc/blog-heading', [App\Http\Controllers\User\AIContentCreatorController::class, "aiBlogHeading"])->name('ai.blog.content');
        Route::get('ai/gc/blog-description', [App\Http\Controllers\User\AIContentCreatorController::class, "aiBlogDescription"])->name('ai.blog.description');
        Route::get('ai/gc/blog-story-ideas', [App\Http\Controllers\User\AIContentCreatorController::class, "aiBlogStoryIdeas"])->name('ai.blog.story.ideas');
        Route::get('ai/gc/content-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiContentCreator"])->name('ai.content.creator');
        Route::get('ai/gc/paragraph-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiParagraphCreator"])->name('ai.paragraph.creator');
        Route::get('ai/gc/summarization-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiSummarizationCreator"])->name('ai.summarization.creator');
        Route::get('ai/gc/product-name-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiProductNameCreator"])->name('ai.product.name.creator');
        Route::get('ai/gc/product-description-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiProductDescriptionCreator"])->name('ai.product.description.creator');
        Route::get('ai/gc/startup-name-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiStartUpNameCreator"])->name('ai.startup.name.creator');
        Route::get('ai/gc/product-review-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiProductReviewCreator"])->name('ai.product.review.creator');
        Route::get('ai/gc/service-review-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiServiceReviewCreator"])->name('ai.service.review.creator');
        Route::get('ai/gc/youtube-title-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiYoutubeTitleCreator"])->name('ai.youtube.title.creator');
        Route::get('ai/gc/youtube-tags-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiYoutubeTagsCreator"])->name('ai.youtube.tags.creator');
        Route::get('ai/gc/youtube-outline-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiYoutubeOutlineCreator"])->name('ai.youtube.outline.creator');
        Route::get('ai/gc/youtube-intro-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiYoutubeIntroCreator"])->name('ai.youtube.intro.creator');
        Route::get('ai/gc/youtube-ideas-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiYoutubeIdeasCreator"])->name('ai.youtube.ideas.creator');
        Route::get('ai/gc/youtube-description-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiYoutubeDescriptionCreator"])->name('ai.youtube.description.creator');
        Route::get('ai/gc/youtube-shorts-script-creator', [App\Http\Controllers\User\AIContentCreatorController::class, "aiYoutubeShortsScriptCreator"])->name('ai.youtube.shorts.script.creator');
        Route::get('ai/gc/write-me', [App\Http\Controllers\User\AIContentCreatorController::class, "aiWriteMeCreator"])->name('ai.write.me.creator');
        Route::get('ai/gc/welcome-email', [App\Http\Controllers\User\AIContentCreatorController::class, "aiWelcomeEmailCreator"])->name('ai.welcome.email.creator');
        Route::get('ai/gc/website-meta-description', [App\Http\Controllers\User\AIContentCreatorController::class, "aiWebsiteMetaDescriptionCreator"])->name('ai.website.meta.description.creator');
        Route::get('ai/gc/website-meta-keywords', [App\Http\Controllers\User\AIContentCreatorController::class, "aiWebsiteMetaKeywordsCreator"])->name('ai.website.meta.keywords.creator');
        Route::get('ai/gc/website-meta-title', [App\Http\Controllers\User\AIContentCreatorController::class, "aiWebsiteMetaTitleCreator"])->name('ai.website.meta.title.creator');
        Route::get('ai/gc/event-promotion-email', [App\Http\Controllers\User\AIContentCreatorController::class, "aiEventpromotionEmailCreator"])->name('ai.event.promotion.email.creator');
        Route::get('ai/gc/twitter-writer', [App\Http\Controllers\User\AIContentCreatorController::class, "aiTwitterWriterCreator"])->name('ai.twitter.writer.creator');
        Route::get('ai/gc/aida-framework', [App\Http\Controllers\User\AIContentCreatorController::class, "aiAidaFrameworkCreator"])->name('ai.aida.framework.creator');
        Route::get('ai/gc/presentation', [App\Http\Controllers\User\AIContentCreatorController::class, "aiPresentationCreator"])->name('ai.presentation.creator');
        Route::get('ai/gc/ask-question', [App\Http\Controllers\User\AIContentCreatorController::class, "aiAskQuestionCreator"])->name('ai.ask.question.creator');
        Route::get('ai/gc/landing-page', [App\Http\Controllers\User\AIContentCreatorController::class, "aiLandingPageCreator"])->name('ai.landing.page.creator');
        Route::get('ai/gc/google-ads', [App\Http\Controllers\User\AIContentCreatorController::class, "aiGoogleAdsCreator"])->name('ai.google.ads.creator');
        Route::get('ai/gc/custom-prompt', [App\Http\Controllers\User\AIContentCreatorController::class, "aiCustomPromptCreator"])->name('ai.custom.prompt.creator');
        Route::get('ai/gc/generate-by-website-url', [App\Http\Controllers\User\AIContentCreatorController::class, "aiGenerateByWebsiteUrlCreator"])->name('ai.generate.by.website.url');

        Route::post('ai/gc/generate', [App\Http\Controllers\User\AIContentCreatorController::class, "generateAiContent"])->name('generate.ai.content');
        
        Route::get('ai/gc/view/{id}', [App\Http\Controllers\User\AIContentCreatorController::class, "viewAiContent"])->name('view.ai.content');
        Route::get('ai/gc/edit/{id}', [App\Http\Controllers\User\AIContentCreatorController::class, "editAiContent"])->name('edit.ai.content');
        Route::post('ai/gc/update', [App\Http\Controllers\User\AIContentCreatorController::class, "updateAiContent"])->name('update.ai.content');
        Route::get('ai/gc/export-docs/{id}', [App\Http\Controllers\User\AIContentCreatorController::class, "exportDocsAiContent"])->name('export.docs.content');
        Route::get('ai/gc/delete', [App\Http\Controllers\User\AIContentCreatorController::class, "deleteAiContent"])->name('delete.ai.content');

        // Create AI Images 
        Route::get('ai/gi', [App\Http\Controllers\User\AiImageCreatorController::class, "indexAllAiImage"])->name('all.ai.images');
        Route::get('ai/gi/new', [App\Http\Controllers\User\AiImageCreatorController::class, "indexNewAiImage"])->name('new.ai.image');
        Route::post('ai/gi/generate', [App\Http\Controllers\User\AiImageCreatorController::class, "generateAiImage"])->name('generate.ai.image');
        Route::get('ai/gi/view/{id}', [App\Http\Controllers\User\AiImageCreatorController::class, "viewAiImage"])->name('view.ai.image');
        Route::get('ai/gi/delete-image', [App\Http\Controllers\User\AiImageCreatorController::class, "deleteAiImage"])->name('delete.ai.image');

        // Create AI Speech to text 
        Route::get('ai/gst', [App\Http\Controllers\User\AiSpeechToTextController::class, "indexAllAiSpeechToText"])->name('all.ai.speech.to.text');
        Route::get('ai/gst/new', [App\Http\Controllers\User\AiSpeechToTextController::class, "indexNewAiSpeechToText"])->name('new.ai.speech.to.text');
        Route::post('ai/gst/generate', [App\Http\Controllers\User\AiSpeechToTextController::class, "generateAiSpeechToText"])->name('generate.ai.speech.to.text');
        Route::get('ai/gst/view/{id}', [App\Http\Controllers\User\AiSpeechToTextController::class, "viewAiSpeechToText"])->name('view.ai.speech.to.text');
        Route::get('ai/gst/edit/{id}', [App\Http\Controllers\User\AiSpeechToTextController::class, "editAiSpeechToText"])->name('edit.ai.speech.to.text');
        Route::post('ai/gst/update', [App\Http\Controllers\User\AiSpeechToTextController::class, "updateAiSpeechToText"])->name('update.ai.speech.to.text');
        Route::get('ai/gst/export-docs/{id}', [App\Http\Controllers\User\AiSpeechToTextController::class, "exportDocsAiSpeechToText"])->name('export.docs.speech.to.text');

        // Create AI Code
        Route::get('ai/gcode', [App\Http\Controllers\User\AiCodeController::class, "indexAllAiCode"])->name('all.ai.code');
        Route::get('ai/gcode/new', [App\Http\Controllers\User\AiCodeController::class, "indexNewAiCode"])->name('new.ai.code');
        Route::post('ai/gcode/generate', [App\Http\Controllers\User\AiCodeController::class, "generateAiCode"])->name('generate.ai.code');
        Route::get('ai/gcode/view/{id}', [App\Http\Controllers\User\AiCodeController::class, "viewAiCode"])->name('view.ai.code');
        Route::get('ai/gcode/edit/{id}', [App\Http\Controllers\User\AiCodeController::class, "editAiCode"])->name('edit.ai.code');
        Route::post('ai/gcode/update', [App\Http\Controllers\User\AiCodeController::class, "updateAiCode"])->name('update.ai.code');
        Route::get('ai/gcode/export-docs/{id}', [App\Http\Controllers\User\AiCodeController::class, "exportDocsAiCode"])->name('export.docs.code');

        //Addtional Tootls -> QR Maker
        Route::get('tools/whois-lookup', [App\Http\Controllers\User\AdditionalController::class, "whoisLookup"])->name('whois-lookup');
        Route::post('tools/whois-lookup', [App\Http\Controllers\User\AdditionalController::class, "resultWhoisLookup"])->name('result.whois-lookup');
        Route::get('tools/dns-lookup', [App\Http\Controllers\User\AdditionalController::class, "dnsLookup"])->name('dns-lookup');
        Route::post('tools/dns-lookup', [App\Http\Controllers\User\AdditionalController::class, "resultDnsLookup"])->name('result.dns-lookup');
        Route::get('tools/ip-lookup', [App\Http\Controllers\User\AdditionalController::class, "ipLookup"])->name('ip-lookup');
        Route::post('tools/ip-lookup', [App\Http\Controllers\User\AdditionalController::class, "resultIpLookup"])->name('result.ip-lookup');

        // Transactions
        Route::get('transactions', [App\Http\Controllers\User\TransactionsController::class, "indexTransactions"])->name('transactions');
        Route::get('view-invoice/{id}', [App\Http\Controllers\User\TransactionsController::class, "viewInvoice"])->name('view.invoice');

        // Billing
        Route::get('billing/{id}', [App\Http\Controllers\User\BillingController::class, "billing"])->name('billing');
        Route::post('update-billing', [App\Http\Controllers\User\BillingController::class, "updateBilling"])->name('update.billing');

        // Checkout
        Route::get('checkout/{id}', [App\Http\Controllers\User\CheckOutController::class, "checkout"])->name('checkout');

        // Account Setting
        Route::get('account', [App\Http\Controllers\User\AccountController::class, "index"])->name('index.account');
        Route::get('edit-account', [App\Http\Controllers\User\AccountController::class, "editAccount"])->name('edit.account');
        Route::post('update-account', [App\Http\Controllers\User\AccountController::class, "updateAccount"])->name('update.account');
        Route::get('change-password', [App\Http\Controllers\User\AccountController::class, "changePassword"])->name('change.password');
        Route::post('update-password', [App\Http\Controllers\User\AccountController::class, "updatePassword"])->name('update.password');

        // Change theme
        Route::get('theme/{id}', [App\Http\Controllers\User\AccountController::class, "changeTheme"])->name('change.theme');

        // Resend Email Verfication
        Route::get('verify-email-verification', [App\Http\Controllers\User\VerificationController::class, "verifyEmailVerification"])->name('verify.email.verification');
        Route::get('resend-email-verification', [App\Http\Controllers\User\VerificationController::class, "resendEmailVerification"])->name('resend.email.verification');
    });

    // Google auth routes
    Route::get('/google-login', [App\Http\Controllers\Auth\LoginController::class, "redirectToProvider"])->name('login.google');
    Route::get('/sign-in-with-google', [App\Http\Controllers\Auth\LoginController::class, "handleProviderCallback"]);


    Route::group(['middleware' => 'checkType'], function () {
        // Choose Payment Gateway
        Route::post('/prepare-payment/{planId}', [App\Http\Controllers\Payment\PaymentController::class, "preparePaymentGateway"])->name('prepare.payment.gateway');

        // PayPal Payment Gateway
        Route::get('/payment-paypal/{planId}', [App\Http\Controllers\Payment\PaypalController::class, "paywithpaypal"])->name('paywithpaypal');
        Route::get('/payment/status', [App\Http\Controllers\Payment\PaypalController::class, "paypalPaymentStatus"])->name('paypalPaymentStatus');

        // RazorPay
        Route::get('payment-razorpay/{planId}', [App\Http\Controllers\Payment\RazorPayController::class, "prepareRazorpay"])->name('paywithrazorpay');
        Route::get('razorpay-payment-status/{oid}/{paymentId}', [App\Http\Controllers\Payment\RazorPayController::class, "razorpayPaymentStatus"])->name('razorpay.payment.status');

        // Stripe
        Route::get('/payment-stripe/{planId}', [App\Http\Controllers\Payment\StripeController::class, "stripeCheckout"])->name('paywithstripe');
        Route::post('/stripe-payment-status/{paymentId}', [App\Http\Controllers\Payment\StripeController::class, "stripePaymentStatus"])->name('stripe.payment.status');
        Route::get('/stripe-payment-cancel/{paymentId}', [App\Http\Controllers\Payment\StripeController::class, "stripePaymentCancel"])->name('stripe.payment.cancel');

        // Paystack
        Route::get('/payment-paystack/{planId}', [App\Http\Controllers\Payment\PaystackController::class, "paystackCheckout"])->name('paywithpaystack');
        Route::get('/paystack-payment/callback', [App\Http\Controllers\Payment\PaystackController::class, 'paystackHandleGatewayCallback'])->name('paystack.handle.gateway.callback');

        // Mollie
        Route::get('/payment-mollie/{planId}', [App\Http\Controllers\Payment\MollieController::class, "prepareMollie"])->name('paywithmollie');
        Route::get('/mollie-payment-status', [App\Http\Controllers\Payment\MollieController::class, "molliePaymentStatus"])->name('mollie.payment.status');

        // Offline
        Route::get('/payment-offline/{planId}', [App\Http\Controllers\Payment\OfflineController::class, "offlineCheckout"])->name('paywithoffline');
        Route::post('/mark-offline-payment', [App\Http\Controllers\Payment\OfflineController::class, "markOfflinePayment"])->name('mark.payment.payment');
    });
