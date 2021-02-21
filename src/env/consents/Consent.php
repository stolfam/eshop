<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Consents;

    /**
     * Class Consent
     * @package Stolfam\Eshop\Env\Consents
     */
    class Consent
    {
        const POLICY = "policy";
        const PRIVACY_POLICY = "privacy_policy";
        const EMAIL_SUBSCRIPTION = "email_subscription";

        public string $name;
        public bool $given;

        /**
         * Consent constructor.
         * @param string $name
         * @param bool   $given
         */
        public function __construct(string $name, bool $given)
        {
            $this->name = $name;
            $this->given = $given;
        }

        /**
         * @param bool $given
         * @return Consent
         */
        public static function getPolicy(bool $given = true): Consent
        {
            return new Consent(self::POLICY, $given);
        }

        /**
         * @param bool $given
         * @return Consent
         */
        public static function getPrivacyPolicy(bool $given = true): Consent
        {
            return new Consent(self::PRIVACY_POLICY, $given);
        }

        /**
         * @param bool $given
         * @return Consent
         */
        public static function getEmailSubscription(bool $given = true): Consent
        {
            return new Consent(self::EMAIL_SUBSCRIPTION, $given);
        }
    }