import { Request, Response } from "express";
import Inscription from "../models/Inscription";

class InscriptionController {
    static async show(_: Request, res: Response) {
        console.log('InscriptionController.show');
        const events = await Inscription.findAll();
        return res.json(events);
    }

    static async index(req: Request, res: Response) {
        const event = await Inscription.findByPk(req.params.id);
        return res.json(event);
    }

    static async store(req: Request, res: Response) {
        const event = await Inscription.create(req.body);
        return res.json(event);
    }

    static async update(req: Request, res: Response) {
        const event = await Inscription.findByPk(req.params.id);
        await event?.update(req.body);
        return res.json(event);
    }

    static async destroy(req: Request, res: Response) {
        const event = await Inscription.findByPk(req.params.id);
        await event?.destroy();
        return res.json(event);
    }
}

export default InscriptionController;