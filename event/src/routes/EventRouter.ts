import { Router } from "express";
import EventController from "../controllers/EventController";

const eventRouter = Router();

eventRouter.get('/', (req, res) => {
    EventController.show(req, res)
});

eventRouter.get('/:id', (req, res) => {
    EventController.index(req, res)
});

eventRouter.post('/', (req, res) => {
    EventController.store(req, res)
});

eventRouter.put('/:id', (req, res) => {
    EventController.update(req, res)
});

eventRouter.delete('/:id', (req, res) => {
    EventController.destroy(req, res)
});

export default eventRouter;