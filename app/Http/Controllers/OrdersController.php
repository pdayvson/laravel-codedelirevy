<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\OrderItemRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var OrderItemRepository
     */
    private $orderItemRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(OrderRepository $repository, OrderItemRepository $orderItemRepository, ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->orderItemRepository = $orderItemRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
	{
		$orders = $this->repository->paginate();

		return view('admin.orders.index', compact('orders'));
	}

    public function edit($id, UserRepository $userRepository)
    {
        $order = $this->repository->find($id);
        $list_status = [0 => 'Pendente', 1 => 'A caminho', 2 => 'Entregue', 3 => 'Cancelado'];
        $deliveryman = $userRepository->getDeliverymen();

        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.orders.index');
    }

}
