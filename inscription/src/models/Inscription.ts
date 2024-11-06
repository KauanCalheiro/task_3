import { DataTypes, Model, Optional } from "sequelize";
import sequelizeConnection from "../database/Config";

interface InscriptionInterface {
    id: number;
    ref_user: number;
    ref_event: number;
    dt_inscription: Date;
}

export interface InscriptionInput extends Optional<InscriptionInterface, 'id'> {}
export interface InscriptionOutput extends Required<InscriptionInterface> {}

class Inscription extends Model<InscriptionInterface, InscriptionInput> implements InscriptionInterface {
    public id!: number;
    public ref_user!: number;
    public ref_event!: number;
    public dt_inscription!: Date;

    public readonly created_at!: Date;
    public readonly updated_at!: Date;
    public readonly deleted_at!: Date;
}

Inscription.init({
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true
    },
    ref_user: {
        type: DataTypes.INTEGER,
        allowNull: false
    },
    ref_event: {
        type: DataTypes.INTEGER,
        allowNull: false
    },
    dt_inscription: {
        type: DataTypes.DATE,
        allowNull: false
    }
}, {
    tableName: 'events',
    timestamps: true,
    createdAt: 'created_at',
    updatedAt: 'updated_at',
    deletedAt: 'deleted_at',
    sequelize: sequelizeConnection,
    paranoid: true
});

export default Inscription;
