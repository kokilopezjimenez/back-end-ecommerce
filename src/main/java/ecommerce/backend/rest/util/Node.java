package ecommerce.backend.rest.util;

import com.fasterxml.jackson.databind.ser.std.NumberSerializer;

class Node {
	private Node leftChild, rightChild;

	public Node(Node leftChild, Node rightChild) {
		this.leftChild = leftChild;
		this.rightChild = rightChild;
	}

	public Node getLeftChild() {
		return this.leftChild;
	}

	public Node getRightChild() {
		return this.rightChild;
	}

	public int height(Node root) {
		throw new UnsupportedOperationException("Waiting to be implemented.");

	}

	public int height2(Node root) {
				
		if (root == null) {
		 return 0; 
		}
		else {
		 return 1 + Math.max(height2(root.getLeftChild()), height2(root.getRightChild()));
		}
	
		/*
		int heightLeft = 0;
		int heightRight = 0;

		Node nodeTmp = root;

		boolean left = true;
		boolean right = true;

		boolean totalLeft = false;
		boolean totalRight = false;

		while ((nodeTmp.getLeftChild() != null) || (nodeTmp.getRightChild() != null) && (left && right)) {

			if (!left && !right) {
				nodeTmp = root;
			}

			if (nodeTmp.getLeftChild() != null) {
				nodeTmp = nodeTmp.getLeftChild();
				left = true;
			}

			if (nodeTmp.getRightChild() != null) {
				nodeTmp = nodeTmp.getRightChild();
				right = true;
			}

			if (nodeTmp.getLeftChild() == null) {
				left = false;
			}

			if (nodeTmp.getRightChild() == null) {
				right = false;
			}

			if (left) {
				heightLeft = heightLeft + 1;
			}

			if (right) {
				heightRight = heightRight + 1;
			}

		}

		if (heightLeft > heightRight)
			return heightLeft;
		else
			return heightRight;
			
		*/
	
	}

	public static void main(String[] args) {
		
		Node leaf1 = new Node(null, null);
		Node leaf2 = new Node(null, null);
		Node node = new Node(leaf1, null);
		Node root = new Node(node, leaf2);

		System.out.println(root.height2(root));
		
	}

}