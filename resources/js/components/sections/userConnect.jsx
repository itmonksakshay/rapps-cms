import {useState} from 'react';
import Modal from 'react-bootstrap/Modal';
import Button from 'react-bootstrap/Button';
import { useSelector, useDispatch } from 'react-redux';
import {metamaskConnection} from '../actions/metamaskAction';

export default function UserConnect(){
	
	const dispatch = useDispatch();
	const metamask = useSelector(state => state.metamask);
	const [show, setShow] = useState(false);
	const handleClose = () => setShow(false);
	const handleShow = () => { 
		dispatch(metamaskConnection());
	}
	console.log(metamask);

  return (
    <>
      <Button variant="warning" onClick={handleShow}>
        Connect Metamask
      </Button>

      <Modal show={show} onHide={handleClose}>
        <Modal.Header closeButton>
          <Modal.Title>Modal heading</Modal.Title>
        </Modal.Header>
        <Modal.Body>
        
        </Modal.Body>
        <Modal.Footer>
          <Button variant="primary" onClick={handleClose}>
            Save Changes
          </Button>
        </Modal.Footer>
      </Modal>
    </>
  );
}
	
