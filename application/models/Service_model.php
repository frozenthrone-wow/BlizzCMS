<?php
declare(strict_types=1);

class Service_model extends CI_Model
{
    private LogsService $logsService;
    private ModService $modService;

    /**
     * Service_model constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->logsService = new LogsService();
        $this->modService = new ModService();
    }
}

class LogsService extends CI_Model
{
    /**
     * @param int $author
     * @param int $type
     * @param int $topicid
     * @param string $body
     * @param string $reply
     */
    public function send(int $author, int $type, int $topicid, string $body, string $reply): void
    {
        $this->db->insert('mod_logs', [
            'userid'     => $author,
            'type'       => $type,
            'idtopic'    => $topicid,
            'function'   => $body,
            'annotation' => $reply,
            'datetime'   => $this->wowgeneral->getTimestamp()
        ]);
    }
}

class ModService extends CI_Model
{
    /**
     * @param mixed $userId
     */
    public function checkAccBan(mixed $userId): void
    {
        // Tu lógica para verificar el ban del usuario
    }
}
