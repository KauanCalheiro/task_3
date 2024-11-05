import { Request, Response } from "express";
import Event from "../models/Events";

class EventController {
    static async show(_: Request, res: Response) {
        console.log('EventController.show');
        const events = await Event.findAll();
        return res.json(events);
    }

    static async index(req: Request, res: Response) {
        const event = await Event.findByPk(req.params.id);
        return res.json(event);
    }

    static async store(req: Request, res: Response) {
        const event = await Event.create(req.body);
        return res.json(event);
    }

    static async update(req: Request, res: Response) {
        const event = await Event.findByPk(req.params.id);
        await event?.update(req.body);
        return res.json(event);
    }

    static async destroy(req: Request, res: Response) {
        const event = await Event.findByPk(req.params.id);
        await event?.destroy();
        return res.json(event);
    }
}

export default EventController;