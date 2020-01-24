<?php

namespace Customerio\Endpoint;

class Newsletters extends Base
{
    /**
     * List newsletters
     * @see https://learn.customer.io/api/#apibeta-apinewslettersnewsletters_list
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(array $options)
    {
        $path = $this->newslettersPath();
        return $this->client->get($path, $options);
    }

    /**
     * Get newsletter data
     * @see https://learn.customer.io/api/#apibeta-apinewslettersnewsletters_get
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('Newsletter id is required!', 'GET');
        } // @codeCoverageIgnore

        $path = $this->newslettersPath($options['id']);
        unset($options['id']);

        return $this->client->get($path, $options);
    }

    /**
     * Get newsletter metrics
     * @see https://learn.customer.io/api/#apibeta-apinewslettersnewsletters_get_metrics
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function metrics(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('Newsletter id is required!', 'GET');
        } // @codeCoverageIgnore

        $path = $this->newslettersPath($options['id'], ['metrics']);
        unset($options['id']);

        return $this->client->get($path, $options);
    }

    /**
     * Get metadata about messages sent by a newsletter
     * @see https://learn.customer.io/api/#apibeta-apinewslettersnewsletters_messages
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function messages(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('Newsletter id is required!', 'GET');
        } // @codeCoverageIgnore

        $path = $this->newslettersPath($options['id'], ['messages']);
        unset($options['id']);

        return $this->client->get($path, $options);
    }

    /**
     * Get newsletter link metrics
     * @see https://customer.io/docs/api/#apibeta-apinewslettersnewsletters_get_link_metrics
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLinkMetrics(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('Newsletter id is required!', 'GET');
        } // @codeCoverageIgnore

        $path = $this->newslettersPath($options['id'], ['metrics', 'links']);
        unset($options['id']);

        return $this->client->get($path, $options);
    }

}
