<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;

class TaskChannelList extends ListResource {
    /**
     * Construct the TaskChannelList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             TaskChannel
     */
    public function __construct(Version $version, string $workspaceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['workspaceSid' => $workspaceSid, ];

        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/TaskChannels';
    }

    /**
     * Streams TaskChannelInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(int $limit = null, $pageSize = null): Stream {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads TaskChannelInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return TaskChannelInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null): array {
        return \iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of TaskChannelInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return TaskChannelPage Page of TaskChannelInstance
     */
    public function page($pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE): TaskChannelPage {
        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize, ]);

        $response = $this->version->page('GET', $this->uri, $params);

        return new TaskChannelPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of TaskChannelInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return TaskChannelPage Page of TaskChannelInstance
     */
    public function getPage(string $targetUrl): TaskChannelPage {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new TaskChannelPage($this->version, $response, $this->solution);
    }

    /**
     * Create the TaskChannelInstance
     *
     * @param string $friendlyName A string to describe the TaskChannel resource
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the TaskChannel
     * @param array|Options $options Optional Arguments
     * @return TaskChannelInstance Created TaskChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $friendlyName, string $uniqueName, array $options = []): TaskChannelInstance {
        $options = new Values($options);

        $data = Values::of([
            'FriendlyName' => $friendlyName,
            'UniqueName' => $uniqueName,
            'ChannelOptimizedRouting' => Serialize::booleanToString($options['channelOptimizedRouting']),
        ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new TaskChannelInstance($this->version, $payload, $this->solution['workspaceSid']);
    }

    /**
     * Constructs a TaskChannelContext
     *
     * @param string $sid The SID of the TaskChannel resource to fetch
     */
    public function getContext(string $sid): TaskChannelContext {
        return new TaskChannelContext($this->version, $this->solution['workspaceSid'], $sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Taskrouter.V1.TaskChannelList]';
    }
}