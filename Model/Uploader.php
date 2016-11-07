<?php

namespace Staempfli\Spreadsheet\Model;

use Magento\Framework\File\UploaderFactory;
use Magento\Framework\Filesystem;
use Magento\ImportExport\Model\Import;
use Magento\Framework\App\Filesystem\DirectoryList;

class Uploader
{
    const STORAGE_DIR = 'spreadsheet/';
    /**
     * @var string
     */
    protected $file = '';
    /**
     * @var Filesystem\Directory\WriteInterface
     */
    protected $uploadDir;
    /**
     * @var UploaderFactory
     */
    protected $uploaderFactory;
    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * Upload constructor.
     * @param UploaderFactory $uploaderFactory
     * @param Filesystem $filesystem
     */
    public function __construct(
        UploaderFactory $uploaderFactory,
        Filesystem $filesystem
    ) {
        $this->uploaderFactory = $uploaderFactory;
        $this->filesystem = $filesystem;
        $this->uploadDir = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
    }

    /**
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public function upload($params = ['fileId' => 'file'])
    {
        /** @var $uploader \Magento\Framework\File\Uploader */
        $uploader = $this->uploaderFactory->create($params);
        $saveDir = $this->uploadDir->getAbsolutePath(self::STORAGE_DIR);
        $result = $uploader->save($saveDir);
        $this->file = $result['path'] . $result['file'];
        return $this->file;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }
}
