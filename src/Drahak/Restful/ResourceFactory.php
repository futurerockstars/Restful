<?php
namespace Drahak\Restful;

use Drahak\Restful\Converters\ResourceConverter;
use Drahak\Restful\Utils\Strings;
use Nette\Http\IRequest;
use Nette\SmartObject;

/**
 * ResourceFactory
 * @package Drahak\Restful
 * @author Drahomír Hanák
 */
class ResourceFactory implements IResourceFactory
{

	use SmartObject;

	/** @var IRequest */
	private $request;

	/** @var ResourceConverter */
	private $resourceConverter;

	/**
	 * @param IRequest $request
	 * @param ResourceConverter $resourceConverter
	 */
	public function __construct(IRequest $request, ResourceConverter $resourceConverter)
	{
		$this->request = $request;
		$this->resourceConverter = $resourceConverter;
	}

	/**
	 * Create new API resource
	 * @param array $data
	 * @return IResource
	 *
	 * @throws  InvalidStateException If Accept header is unknown
	 */
	public function create(array $data = array()): IResource
	{
		return new ConvertedResource($this->resourceConverter, $data);
	}

}
