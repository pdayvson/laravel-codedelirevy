<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminOrderRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderItemRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;

class OrdersController extends Controller
{
    /**
     * @var CategoryRepository
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

	public function create()
	{
        $products = $this->productRepository->lists('name', 'id');
		return view('admin.orders.create', compact('products'));
	}

	public function store(AdminOrderRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.orders.index');
    }

    public function edit($id)
    {
        $order = $this->repository->find($id);
        $orderItens = $this->orderItemRepository->findByField('order_id', $id);

        return view('admin.orders.edit', compact('order', 'orderItens'));
    }

    public function update(AdminOrderRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.orders.index');
    }
}
